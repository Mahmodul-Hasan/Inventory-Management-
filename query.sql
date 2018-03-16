create or replace procedure item_store (itname ITEMS.ITEM_ID%type,scat_name ITEMS.SUBCATEGORY_NAME%type,
    stocks ITEMS.ITEM_STOCK%type,uprice ITEMS.ITEM_PRICE%type,disc ITEMS.ITEM_DISCOUNT%type) as

id_var number;
cat_id number;
cat_name varchar2(30);
begin 
select max(ITEM_ID) into id_var from ITEMS;
id_var := id_var+1;
select CATEGORY_ID into cat_id from SUBCATEGORY where SUBCATEGORY_NAME = scat_name;
select CATEGORY_NAME into cat_name from CATEGORY where CATEGORY_ID = cat_id;

insert into ITEMS values(id_var,itname,cat_name,scat_name,stocks,uprice,disc,sysdate);
end;​




create or replace procedure add_items (iname ITEMS.ITEM_ID%type,cate_name ITEMS.CATEGORY_NAME%type,subcat_name ITEMS.SUBCATEGORY_NAME%type,stock ITEMS.ITEM_STOCK%type,price ITEMS.ITEM_PRICE%type,dis ITEMS.ITEM_DISCOUNT%type,pdate ITEMS.ITEM_PRO_DATE%type) as
id_var number;
begin 
select max(ITEM_ID) into id_var from ITEMS;
id_var := id_var+1;
insert into ITEMS values(id_var,iname,cate_name,subcat_name,stock,price,dis,to_date('pdate','YYYY-MM-DD'));
end;​