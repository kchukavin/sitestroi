<?php


if (! defined('DIAFAN'))
{
    $path = __FILE__;
    while(! file_exists($path.'/includes/404.php'))
    {
        $parent = dirname($path);
        if($parent == $path) exit;
        $path = $parent;
    }
    include $path.'/includes/404.php';
}


class PageParser
{
    public $url;
    protected $doc = null;

    public function __construct($url)
    {
        $this->url = $url;
    }

    protected function getDoc()
    {
        if ($this->doc === null) {
            $this->doc = new DOMDocument();
            $this->doc->strictErrorChecking = false;
            libxml_use_internal_errors(true);
            $this->doc->loadHTMLFile($this->url);
            libxml_clear_errors();
        }

        return $this->doc;
    }

    protected function getTagsByQuery($query)
    {
        $xpath = new DOMXpath($this->getDoc());
        $tags = $xpath->query($query);

        $r = [];
        foreach ($tags as $tag) {
            $r []= $tag;
        }

        return $r;
    }

    protected function getTagText($tag)
    {
        return $tag->nodeValue;
    }

    protected function getTagHtml($tag)
    {
        return $this->getDoc()->saveHTML($tag);
    }

    protected function getTagAttribute($attrName, $tag)
    {
        if (is_array($tag)) {
            $r = [];
            foreach ($tag as $item) {
                $r []= $this->getTagAttribute($attrName, $item);
            }
        } else {
            $r = $tag->getAttribute($attrName);
        }
        return $r;
    }

    public function parse()
    {

        //$r = $this->getByQuery("//*/h1[contains(concat(' ', normalize-space(@class), ' '), ' section__title ')]");
        //$r = $this->getByQuery('//*/h1');

        //print_r($this->getTagHtml($this->getTagsByQuery('//div[@id="sliderFrame"]/a')[0])); die();

        $r['name'] = $this->getTagText($this->getTagsByQuery('//h1')[0]);
        $r['images'] = $this->getTagAttribute('href', $this->getTagsByQuery(
            '//div[@id="sliderFrame"]/a' . '|' .
            '//div[@id="sliderFrame"]/*/a'
        ));
        //$r['description'] = $this->getTagHtml($this->getTagsByQuery('//div[@id="description"]')[0]);
        $r['description'] = $this->getTagHtml($this->getTagsByQuery('//div[@class="section-details-box"]')[0]);
        

        return $r;
    }
}

class MultiPageParser
{
    public $urls = [];

    public function __construct($urls = [])
    {
        if (!empty($urls)) $this->urls = $urls;
    }

    public function parse()
    {
        $r = [];

        foreach ($this->urls as $url) {
            $pageParser = new PageParser($url);
            $r []= $pageParser->parse();
        }

        return $r;
    }

    protected function getCSVFileName()
    {
        $baseDir = 'userfls/parsed/';
        if (!file_exists(ABSOLUTE_PATH . $baseDir)) {
            mkdir(ABSOLUTE_PATH . $baseDir);
        }
        $name = $baseDir . 'parsed_' . date('Y-m-d_H-i-s') .'.csv';
        return $name;
    }

    public function saveCSV()
    {
        $filename = $this->getCSVFileName();

        $parsed = $this->parse();

        $fp = fopen(ABSOLUTE_PATH . $filename, 'w');

        foreach ($parsed as $row) {

            $fields = [
                $row['name'],
                $row['description'],
                implode('|', $row['images']),
            ];
            fputcsv($fp, $fields, ';');
        }

        fclose($fp);

        return BASE_PATH . $filename;
        //$array = $this->parse();


    }
}

$parser = new MultiPageParser([
    'https://www.vekpro.ru/hgd/',
    'https://www.vekpro.ru/ta-400-s-macc/',
    'https://www.vekpro.ru/ta-400-macc/',
    'https://www.vekpro.ru/new-350-s-macc/',
    'https://www.vekpro.ru/new-350-edv-macc/',
    'https://www.vekpro.ru/new-350-macc/',
    'https://www.vekpro.ru/new-315-edv-macc/',
    'https://www.vekpro.ru/new-315-macc/',
    'https://www.vekpro.ru/new-300-macc/',
    'https://www.vekpro.ru/new-250-dv-macc/',
    'https://www.vekpro.ru/new-250-macc/',
    'https://www.vekpro.ru/cs275/',
    'https://www.vekpro.ru/macc-nts315-poluavtomaticheskij/',
    'https://www.vekpro.ru/k225-macc/',
    'https://www.vekpro.ru/trs-275-macc/',
    'https://www.vekpro.ru/otreznaya-mashina-euroboor-edc135-s-diskom/',
]);

$link = $parser->saveCSV();

echo '<a href="'. $link .'">'. $link .'</a>';

die();