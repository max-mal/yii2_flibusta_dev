#!/bin/bash

IMPORT_FOLDER="import_db"
DB_USER="root"
DB_PASSWORD="lib"
DB_NAME="lib"
DB_SERVER="db"

rm -rf import_db
mkdir import_db
cd import_db

echo "Downloading files..."
wget http://flibusta.is/sql/lib.libavtor.sql.gz
wget http://flibusta.is/sql/lib.libtranslator.sql.gz
wget http://flibusta.is/sql/lib.libavtorname.sql.gz
wget http://flibusta.is/sql/lib.libbook.sql.gz
wget http://flibusta.is/sql/lib.libfilename.sql.gz
wget http://flibusta.is/sql/lib.libgenre.sql.gz
wget http://flibusta.is/sql/lib.libgenrelist.sql.gz
wget http://flibusta.is/sql/lib.libjoinedbooks.sql.gz
wget http://flibusta.is/sql/lib.librate.sql.gz
wget http://flibusta.is/sql/lib.librecs.sql.gz
wget http://flibusta.is/sql/lib.libseqname.sql.gz
wget http://flibusta.is/sql/lib.libseq.sql.gz

wget http://flibusta.is/sql/lib.reviews.sql.gz
wget http://flibusta.is/sql/lib.b.annotations.sql.gz
wget http://flibusta.is/sql/lib.a.annotations.sql.gz
wget http://flibusta.is/sql/lib.a.annotations_pics.sql.gz

echo "Extracting files..."
gzip -d lib.libavtor.sql.gz
gzip -d lib.libtranslator.sql.gz
gzip -d lib.libavtorname.sql.gz
gzip -d lib.libbook.sql.gz
gzip -d lib.libfilename.sql.gz
gzip -d lib.libgenre.sql.gz
gzip -d lib.libgenrelist.sql.gz
gzip -d lib.libjoinedbooks.sql.gz
gzip -d lib.librate.sql.gz
gzip -d lib.librecs.sql.gz
gzip -d lib.libseqname.sql.gz
gzip -d lib.libseq.sql.gz

gzip -d lib.reviews.sql.gz
gzip -d lib.b.annotations.sql.gz
gzip -d lib.a.annotations.sql.gz
gzip -d lib.a.annotations_pics.sql.gz

echo "Processing sql files..."
mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.libavtor.sql
mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.libtranslator.sql
mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.libavtorname.sql
mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.libbook.sql
mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.libfilename.sql
mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.libgenre.sql
mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.libgenrelist.sql
mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.libjoinedbooks.sql
mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.librate.sql
mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.librecs.sql
mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.libseqname.sql
mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.libseq.sql

mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.reviews.sql
mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.b.annotations.sql
mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.a.annotations.sql
mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME < lib.a.annotations_pics.sql

echo "Creating indices..."
echo 'ALTER TABLE `lib`.`libavtorname` ADD FULLTEXT INDEX `fulltextFirstLastName` (`FirstName`, `LastName`) VISIBLE;' | mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME
echo 'ALTER TABLE `lib`.`libbannotations` ADD INDEX `BookID` (`BookId` ASC) VISIBLE;' | mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME
echo 'ALTER TABLE `lib`.`libaannotations` ADD INDEX `AvtorId` (`AvtorId` ASC) VISIBLE;' | mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME
echo 'ALTER TABLE `lib`.`libapics` ADD INDEX `AvtorId` (`AvtorId` ASC) VISIBLE;' | mysql -h$DB_SERVER -u$DB_USER -p$DB_PASSWORD $DB_NAME
echo "Done"