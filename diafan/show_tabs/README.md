# Генератор табов

show_tabs.php Положить в папку themes/functions/


## Пример использования

```
<insert name="show_tabs" func="begin" tabs_links="tab1;tab2;tab3;tab4" 
    tabs_names="Описание;Размеры, обозначения, стоимость;Дополнительная комплектация;Фото, видео" />
    
    <insert name="show_tabs" func="tab" id="tab1" active="1" />

		Контент описания

    <insert name="show_tabs" func="tab-end" />
    
    <insert name="show_tabs" func="tab" id="tab2" />

    	Значения цены и размеров, обозначения

    <insert name="show_tabs" func="tab-end" />
    
    <insert name="show_tabs" func="tab" id="tab3" />

    	Контент дополнительной комплектации

    <insert name="show_tabs" func="tab-end" />
    
    <insert name="show_tabs" func="tab" id="tab4" />   

    	Фото и видео контент

    <insert name="show_tabs" func="tab-end" />

<insert name="show_tabs" func="end" />
```