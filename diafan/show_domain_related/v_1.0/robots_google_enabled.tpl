# Роботы для основного домена

User-agent: *
Disallow: /adm*
Disallow: /cgi-bin*
Disallow: /includes*
Disallow: /plugins*
Disallow: /themes*
Disallow: /modules*
Disallow: /installation*
Disallow: /compress*
Disallow: /*?

User-agent: Yandex
Disallow: /adm*
Disallow: /cgi-bin*
Disallow: /includes*
Disallow: /plugins*
Disallow: /themes*
Disallow: /modules*
Disallow: /installation*
Disallow: /compress*
Disallow: /*?

# Запрещаем подпапки только для Яндекса
Disallow: /almetievsk
Disallow: /aznakaevo
Disallow: /bugulma
Disallow: /elabuga
Disallow: /leninogorsk
Disallow: /mendeleevsk
Disallow: /nizhnekamsk
Disallow: /zainsk
Disallow: /zelenodolsk
Disallow: /kazan

Host: $DOMAIN
Sitemap: $DOMAIN/sitemap.xml

