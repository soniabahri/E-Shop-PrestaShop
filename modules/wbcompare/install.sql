CREATE TABLE IF NOT EXISTS `PREFIX_wb_compare`(
		`id_compare` int(10) unsigned NOT NULL AUTO_INCREMENT,
		`id_customer` int(10) unsigned NOT NULL,
		PRIMARY KEY (`id_compare`)
) ENGINE=ENGINE_TYPE  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `PREFIX_wb_compare_product`(
		`id_compare` int(10) unsigned NOT NULL,
		`id_product` int(10) unsigned NOT NULL,
		`date_add` datetime NOT NULL,
		`date_upd` datetime NOT NULL,
		PRIMARY KEY (`id_compare`, `id_product`)
) ENGINE=ENGINE_TYPE  DEFAULT CHARSET=utf8;