CREATE TABLE IF NOT EXISTS `{PREFIX}schema` (
`schema_id` INTEGER auto_increment ,
`schema_module` VARCHAR (32)  NOT NULL default '',
`schema_version` INTEGER  NOT NULL default '0',
PRIMARY KEY (`schema_id`)
);