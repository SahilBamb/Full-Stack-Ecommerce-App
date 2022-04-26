#CrAlters table by adds in privacy

ALTER TABLE Users ADD COLUMN Privacy tinyint(1) default 0 COMMENT 'Boolean of public or not public profile';
