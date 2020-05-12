
CREATE TABLE `diafan_shop_rel2` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'идентификатор',
  `element_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'идентификатор товара из таблицы `diafan_shop`',
  `rel2_element_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'идентификатор похожего товара из таблицы `diafan_shop`',
  `trash` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'запись удалена в корзину: 0 - нет, 1 - да',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связи похожих товаров';



ALTER TABLE `diafan_shop_rel2`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'идентификатор';
