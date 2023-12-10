CREATE DATABASE barang_db;

USE barang_db;

CREATE TABLE barang (
  id_barang varchar(11) NOT NULL,
  nama_barang varchar(100) NOT NULL,
  harga_barang int(11) NOT NULL,
  stok_barang int(11) NOT NULL,
  PRIMARY KEY (id_barang)
);
