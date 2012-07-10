<?php
$mysql_conn=mysql_connect('localhost', 'rajanla1_magento', 'magento123') or die("mysql error: couldn't connect");
mysql_select_db("rajanla1_magento") or die("mysql error: couldn't select db");

if (isset($_GET['product_id'])) {
    $product_id=(int) $_GET['product_id'];
} else { echo "<br>no product id? nothing to do."; }

$total_rows=0;

$tables=array();
$tables[]="catalog_product_bundle_option";
$tables[]="catalog_product_bundle_option_value";
$tables[]="catalog_product_bundle_selection";
$tables[]="catalog_product_entity_datetime";
$tables[]="catalog_product_entity_decimal";
$tables[]="catalog_product_entity_gallery";
$tables[]="catalog_product_entity_int";
$tables[]="catalog_product_entity_media_gallery";
$tables[]="catalog_product_entity_media_gallery_value";
$tables[]="catalog_product_entity_text";
$tables[]="catalog_product_entity_tier_price";
$tables[]="catalog_product_entity_varchar";
$tables[]="catalog_product_entity";
$tables[]="catalog_product_link";
$tables[]="catalog_product_link_attribute";
$tables[]="catalog_product_link_attribute_decimal";
$tables[]="catalog_product_link_attribute_int";
$tables[]="catalog_product_link_attribute_varchar";
$tables[]="catalog_product_link_type";
$tables[]="catalog_product_option";
$tables[]="catalog_product_option_price";
$tables[]="catalog_product_option_title";
$tables[]="catalog_product_option_type_price";
$tables[]="catalog_product_option_type_title";
$tables[]="catalog_product_option_type_value";
$tables[]="catalog_product_super_attribute";
$tables[]="catalog_product_super_attribute_label";
$tables[]="catalog_product_super_attribute_pricing";
$tables[]="catalog_product_super_link";
$tables[]="catalogindex_eav";
$tables[]="catalogindex_price";
$tables[]="eav_entity_datetime";
$tables[]="eav_entity_decimal";
$tables[]="eav_entity_int";
$tables[]="eav_entity_text";
$tables[]="eav_entity_varchar";

foreach($tables as $table) {
$table_count=0;
$query="select * from `$table` where `entity_id`=$product_id";
$rs=mysql_query($query, $mysql_conn);
$num_rows= @ mysql_num_rows($rs);
if ($num_rows > 0) {
    echo "<br><br>**data in $table";
    while ($data=mysql_fetch_assoc($rs)) {
        $total_rows++;
        $table_count++;
        echo "<br>";
        foreach($data as $k=>$v) { 
            $$k=$v;
            echo "<br>$k=$v";
        }
    }
    echo "<br>rows: $table_count";
}
}

$tables2=array();
$tables2[]="catalog_category_product";
$tables2[]="catalog_category_product_index";
$tables2[]="catalogsearch_result";
$tables2[]="catalogsearch_fulltext";
$tables2[]="catalogrule_affected_product";
$tables2[]="catalogrule_product_price";
$tables2[]="product_alert_price";
$tables2[]="product_alert_stock";
$tables2[]="catalog_product_website";
$tables2[]="catalog_product_enabled_index";
$tables2[]="core_url_rewrite";
$tables2[]="cataloginventory_stock_item";
$tables2[]="cataloginventory_stock_status";

foreach($tables2 as $table) {
$table_count=0;
$query="select * from `$table` where `product_id`=$product_id";
$rs=mysql_query($query, $mysql_conn);
$num_rows= @ mysql_num_rows($rs);
if ($num_rows > 0) {
    echo "<br><br>**data in $table";
    while ($data=mysql_fetch_assoc($rs)) {
        $total_rows++;
        $table_count++;
        echo "<br>";
        foreach($data as $k=>$v) { 
            $$k=$v;
            echo "<br>$k=$v";
        }
    }
    echo "<br>rows: $table_count";
}
}

$tables3[]=array();
$tables3['catalogrule_product']="rule_product_id";

foreach($tables3 as $table=>$field) {
$table_count=0;
$query="select * from `$table` where `$field`=$product_id";
$rs=mysql_query($query, $mysql_conn);
$num_rows= @ mysql_num_rows($rs);
if ($num_rows > 0) {
    echo "<br><br>**data in $table";
    while ($data=mysql_fetch_assoc($rs)) {
        $total_rows++;
        $table_count++;
        echo "<br>";
        foreach($data as $k=>$v) { 
            $$k=$v;
            echo "<br>$k=$v";
        }
    }
    echo "<br>rows: $table_count";
}
}

mysql_close($mysql_conn);
echo "<br><br>TOTAL ROWS: $total_rows";

