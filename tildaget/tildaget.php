<?php


class TildaGet
{
    public $links = [];

    public function __construct($links = [])
    {
        $this->links = $links;
    }

    protected function getDataDir()
    {
        return __DIR__ . '/data/';
    }

    protected function getFileNameFromUrl($url)
    {
        $parsed = parse_url($url);
        $r = $this->getDataDir() . $parsed['host'] . $parsed['path'];
        return $r;
    }

    protected function createFileDir($file)
    {
        $dir = dirname($file);
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
    }

    protected function saveFile($file, $content)
    {
        $this->createFileDir($file);
        file_put_contents($file, $content);
    }

    protected function getFile($url)
    {
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_POST => false,
            //CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_VERBOSE => false,
        ];
        
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $server_output = curl_exec($ch);
        
        if ($server_output === false) $server_output = 'CURL Ошибка: ' . curl_error($ch);

        curl_close ($ch);

        return $server_output;
    }

    protected function getPregResults($pattern, $text)
    {
        if (preg_match_all($pattern, $text, $out)) {
            return $out[1];
        }

        return [];
    }

    protected function getLinksFromContent($content)
    {
        $links = $this->getPregResults('~src=[\'\"](.+?)[\'\"]~', $content);
        $links = array_merge(
            $links,
            $this->getPregResults('~data-original=[\'\"](.+?)[\'\"]~', $content),
            $this->getPregResults('~<link rel=\"stylesheet\".+?href=[\'\"](.+?)[\'\"]~', $content)
        );
        return $links;
    }

    protected function downloadFile($url)
    {
        $filename = $this->getFileNameFromUrl($url);
        echo 'D ' . $url . ' ...';
        if (file_exists($filename)) {
            echo 'skipped.' . PHP_EOL;
            return;
        }
        
        $content = $this->getFile($url);
        $this->saveFile($filename, $content);
        echo 'saved to ' . $filename . PHP_EOL;
    }

    protected function downloadLinks($links)
    {
        foreach ($links as $link) {
            $this->downloadFile($link);
        }
    }

    protected function patchContent($content)
    {
        $replaces = [
            [
                'pattern' => '~https://static.tildacdn.com/~',
                'to' => 'static/',
            ],
            [
                'pattern' => '~https://tilda.ws/project~',
                'to' => 'project',
            ],
            [
                'pattern' => '~<!-- Google Tag Manager -->.+<!-- End Google Tag Manager -->~',
                'to' => '<!-- GTM cutted -->',
            ],
            [
                'pattern' => '~<\!-- Tilda copyright.*?\)\;</script></body>~',
                'to' => '<!-- cutted --></body>',
            ],
        ];

        foreach ($replaces as $replace) {
            $content = preg_replace($replace['pattern'], $replace['to'], $content);
        }

        return $content;
    }

    public function run()
    {
        $contentLinks = [];
        foreach ($this->links as $link) {
            $filename = $this->getFileNameFromUrl($link);

            $content = $this->getFile($link);
            $contentLinks = array_merge(
                $contentLinks,
                $this->getLinksFromContent($content)
            );
            $content = $this->patchContent($content);
            $this->saveFile($filename, $content);
        }
        $contentLinks = array_unique($contentLinks);
        $this->downloadLinks($contentLinks);
    }

}


$links = file(__DIR__ . '/get.lst', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$td = new TildaGet($links);
$td->run();




