<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'master' => [
        'title'          => 'Master',
        'title_singular' => 'Master',
    ],
    'unit' => [
        'title'          => 'Unit',
        'title_singular' => 'Unit',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'brand' => [
        'title'          => 'Cover',
        'title_singular' => 'Cover',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'city' => [
        'title'          => 'City',
        'title_singular' => 'City',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'category' => [
        'title'          => 'Category',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'parent'            => 'Parent',
            'parent_helper'     => ' ',
            'type'              => 'Type',
            'type_helper'       => ' ',
        ],
    ],
    'product' => [
        'title'          => 'Product',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'slug'               => 'Slug',
            'slug_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'category'           => 'Category',
            'category_helper'    => ' ',
            'brand'              => 'Cover',
            'brand_helper'       => ' ',
            'unit'               => 'Unit',
            'unit_helper'        => ' ',
            'price'              => 'Sell Price',
            'price_helper'       => ' ',
            'stock'              => 'Stock',
            'stock_helper'       => ' ',
            'min_stock'          => 'Min Stock',
            'min_stock_helper'   => ' ',
            'status'             => 'Is Active',
            'status_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'hpp'                => 'Purchase Price',
            'hpp_helper'         => ' ',
            'foto'               => 'Foto',
            'foto_helper'        => ' ',
            'finishing_cost'        => 'Finishing Cost',
            'finishing_cost_helper' => ' ',
        ],
    ],
    'buku' => [
        'title'          => 'Buku',
        'title_singular' => 'Buku',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Judul/Mapel',
            'name_helper'        => ' ',
            'slug'               => 'Slug',
            'slug_helper'        => ' ',
            'description'        => 'Deskripsi',
            'description_helper' => ' ',
            'category'           => 'Kategori',
            'category_helper'    => ' ',
            'brand'              => 'Cover',
            'brand_helper'       => ' ',
            'unit'               => 'Unit',
            'unit_helper'        => ' ',
            'price'              => 'Sell Price',
            'price_helper'       => ' ',
            'stock'              => 'Stock',
            'stock_helper'       => ' ',
            'min_stock'          => 'Min Stock',
            'min_stock_helper'   => ' ',
            'status'             => 'Is Active',
            'status_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'hpp'                => 'Purchase Price',
            'hpp_helper'         => ' ',
            'foto'               => 'Foto',
            'foto_helper'        => ' ',
            'finishing_cost'        => 'Finishing Cost',
            'finishing_cost_helper' => ' ',
            'jenjang'           => 'Jenjang',
            'jenjang_helper'    => ' ',
            'halaman'           => 'Halaman',
            'halaman_helper'    => ' ',
            'kelas'             => 'Kelas',
            'kelas_helper'      => ' ',
        ],
    ],
    'bahan' => [
        'title'          => 'Bahan',
        'title_singular' => 'Bahan',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Nama Barang',
            'name_helper'        => ' ',
            'slug'               => 'Slug',
            'slug_helper'        => ' ',
            'description'        => 'Deskripsi',
            'description_helper' => ' ',
            'category'           => 'Kategori',
            'category_helper'    => ' ',
            'brand'              => 'Cover',
            'brand_helper'       => ' ',
            'unit'               => 'Unit',
            'unit_helper'        => ' ',
            'price'              => 'Sell Price',
            'price_helper'       => ' ',
            'stock'              => 'Stock',
            'stock_helper'       => ' ',
            'min_stock'          => 'Min Stock',
            'min_stock_helper'   => ' ',
            'status'             => 'Is Active',
            'status_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'hpp'                => 'Purchase Price',
            'hpp_helper'         => ' ',
            'foto'               => 'Foto',
            'foto_helper'        => ' ',
            'finishing_cost'        => 'Finishing Cost',
            'finishing_cost_helper' => ' ',
            'jenjang'           => 'Jenjang',
            'jenjang_helper'    => ' ',
            'halaman'           => 'Halaman',
            'halaman_helper'    => ' ',
            'kelas'             => 'Kelas',
            'kelas_helper'      => ' ',
        ],
    ],
    'salesperson' => [
        'title'          => 'Salesman',
        'title_singular' => 'Salesman',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'code'                  => 'Code',
            'code_helper'           => ' ',
            'name'                  => 'Name',
            'name_helper'           => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'area_pemasaran'        => 'Area Pemasaran',
            'area_pemasaran_helper' => ' ',
            'foto'                  => 'Foto',
            'foto_helper'           => ' ',
            'telephone'             => 'Telepon',
            'telephone_helper'      => ' ',
            'company'               => 'Badan Usaha',
            'company_helper'        => ' ',
            'alamat'                => 'Alamat',
            'alamat_helper'         => ' ',
        ],
    ],
    'order' => [
        'title'          => 'Sales Order',
        'title_singular' => 'Sales Order',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'date'               => 'Date',
            'date_helper'        => ' ',
            'salesperson'        => 'Salesman',
            'salesperson_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'no_order'           => 'SO Number',
            'no_order_helper'    => ' ',
        ],
    ],
    'orderDetail' => [
        'title'          => 'Order Detail',
        'title_singular' => 'Order Detail',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'order'             => 'Order',
            'order_helper'      => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'quantity'          => 'Quantity',
            'quantity_helper'   => ' ',
            'unit_price'        => 'Unit Price',
            'unit_price_helper' => ' ',
            'price'             => 'Price',
            'price_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'total'             => 'Total',
            'total_helper'      => ' ',
        ],
    ],
    'invoice' => [
        'title'          => 'Invoice',
        'title_singular' => 'Invoice',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'no_suratjalan'        => 'No Surat Jalan',
            'no_suratjalan_helper' => ' ',
            'no_invoice'           => 'No Invoice',
            'no_invoice_helper'    => ' ',
            'order'                => 'Order',
            'order_helper'         => ' ',
            'date'                 => 'Date',
            'date_helper'          => ' ',
            'nominal'              => 'Nominal',
            'nominal_helper'       => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'invoiceDetail' => [
        'title'          => 'Invoice Detail',
        'title_singular' => 'Invoice Detail',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'invoice'           => 'Invoice',
            'invoice_helper'    => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'quantity'          => 'Quantity',
            'quantity_helper'   => ' ',
            'price'             => 'Price',
            'price_helper'      => ' ',
            'total'             => 'Total Price',
            'total_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'stockAdjustment' => [
        'title'          => 'Stock Adjustment',
        'title_singular' => 'Stock Adjustment',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'date'              => 'Date',
            'date_helper'       => ' ',
            'operation'         => 'Operation',
            'operation_helper'  => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'quantity'          => 'Quantity',
            'quantity_helper'   => ' ',
            'note'              => 'Note',
            'note_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'stockMovement' => [
        'title'          => 'Stock Movement',
        'title_singular' => 'Stock Movement',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'reference'         => 'Reference',
            'reference_helper'  => ' ',
            'type'              => 'Tipe',
            'type_helper'       => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'quantity'          => 'Quantity',
            'quantity_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'tagihan' => [
        'title'          => 'Tagihan',
        'title_singular' => 'Tagihan',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'order'              => 'Order',
            'order_helper'       => ' ',
            'saldo'              => 'Saldo',
            'saldo_helper'       => ' ',
            'salesperson'        => 'Salesman',
            'salesperson_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'tagihanMovement' => [
        'title'          => 'Tagihan Movement',
        'title_singular' => 'Tagihan Movement',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'reference'         => 'Reference',
            'reference_helper'  => ' ',
            'type'              => 'Type',
            'type_helper'       => ' ',
            'nominal'           => 'Nominal',
            'nominal_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'pembayaran' => [
        'title'          => 'Payment',
        'title_singular' => 'Payment',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'no_kwitansi'        => 'No Kwitansi',
            'no_kwitansi_helper' => ' ',
            'tagihan'            => 'Tagihan',
            'tagihan_helper'     => ' ',
            'nominal'            => 'Nominal',
            'nominal_helper'     => ' ',
            'diskon'             => 'Diskon',
            'diskon_helper'      => ' ',
            'bayar'              => 'Bayar',
            'bayar_helper'       => ' ',
            'tanggal'            => 'Tanggal',
            'tanggal_helper'     => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'stock' => [
        'title'          => 'Stock',
        'title_singular' => 'Stock',
    ],
    'stockOpname' => [
        'title'          => 'Stock Opname',
        'title_singular' => 'Stock Opname',
    ],
    'salesOrder' => [
        'title'          => 'Sales Order',
        'title_singular' => 'Sales Order',
    ],
    'invoiceMenu' => [
        'title'          => 'Invoice',
        'title_singular' => 'Invoice',
    ],
    'tagihanMenu' => [
        'title'          => 'Tagihan',
        'title_singular' => 'Tagihan',
    ],
    'pembayaranMenu' => [
        'title'          => 'Payment',
        'title_singular' => 'Payment',
    ],
    'productionperson' => [
        'title'          => 'Subkontraktor',
        'title_singular' => 'Subkontraktor',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'code'              => 'Code',
            'code_helper'       => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'type'              => 'Type',
            'type_helper'       => ' ',
            'contact'           => 'Telepon',
            'contact_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'alamat'            => 'Alamat',
            'alamat_helper'     => ' ',
            'company'           => 'Badan Usaha',
            'company_helper'    => ' ',
        ],
    ],
    'productionOrder' => [
        'title'          => 'Finishing Order',
        'title_singular' => 'Finishing Order',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'po_number'               => 'Production Number',
            'po_number_helper'        => ' ',
            'no_spk'                  => 'No SPK',
            'no_spk_helper'           => ' ',
            'date'                    => 'Tanggal',
            'date_helper'             => ' ',
            'created_by'              => 'Created By',
            'created_by_helper'       => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'productionperson'        => 'Subkontraktor',
            'productionperson_helper' => ' ',
        ],
    ],
    'production' => [
        'title'          => 'Production',
        'title_singular' => 'Production',
    ],
    'productionOrderDetail' => [
        'title'          => 'Production Order Detail',
        'title_singular' => 'Production Order Detail',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'production_order'        => 'Production Order',
            'production_order_helper' => ' ',
            'product'                 => 'Product',
            'product_helper'          => ' ',
            'order_qty'               => 'Quantity Order',
            'order_qty_helper'        => ' ',
            'prod_qty'                => 'Quantity Production',
            'prod_qty_helper'         => ' ',
            'ongkos_satuan'           => 'Ongkos Satuan',
            'ongkos_satuan_helper'    => ' ',
            'ongkos_total'            => 'Ongkos Total',
            'ongkos_total_helper'     => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
];
