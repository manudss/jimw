CREATE TABLE "{PREFIX}blogcomment" ( "blogcomment_id" INTEGER NOT NULL PRIMARY KEY, blogmessage_id INT(11) NOT NULL, user_id INT(11) , blogcomment_username VARCHAR(127) NOT NULL, blogcomment_content TEXT NOT NULL, blogcomment_date DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' );

CREATE TABLE "{PREFIX}blogmessage" ( "blogmessage_id" INTEGER NOT NULL PRIMARY KEY, tree_parentid INT(11) NOT NULL DEFAULT "0", tree_id INT(11), blogmessage_title VARCHAR(255) NOT NULL DEFAULT "", blogmessage_header TEXT DEFAULT "", blogmessage_content TEXT NOT NULL DEFAULT "", blogmessage_date DATETIME NOT NULL DEFAULT "0000-00-00 00:00:00", user_id INT NOT NULL DEFAULT "0", blogmessage_comment BOOLEAN DEFAULT 'true');
