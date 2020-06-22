
Deferred rendering for speed
When working with large data sources, you might seek to improve the speed at which DataTables runs. One method to do this is to make use of the built-in deferred rendering option in DataTables with the deferRender option.

https://datatables.net/examples/ajax/defer_render.html



====================================================================
OPTIONS
https://datatables.net/reference/option/

API options
https://datatables.net/reference/api/

Events
https://datatables.net/reference/event/

Buttons
https://datatables.net/reference/button/
====================================================================
====================================================================

https://datatables.net/examples/ajax/simple.html

https://datatables.net/examples/ajax/objects.html

https://datatables.net/examples/server_side/post.html

https://datatables.net/examples/server_side/simple.html

https://datatables.net/examples/basic_init/hidden_columns.html

https://datatables.net/examples/data_sources/js_array.html

https://datatables.net/examples/basic_init/scroll_xy.html

https://datatables.net/examples/basic_init/scroll_x.html

https://datatables.net/extensions/buttons/examples/initialisation/export.html
https://datatables.net/extensions/buttons/examples/html5/tsv.html

https://datatables.net/extensions/buttons/examples/html5/pdfMessage.html

https://datatables.net/extensions/buttons/examples/html5/pdfPage.html

https://datatables.net/extensions/buttons/examples/html5/pdfImage.html

https://datatables.net/extensions/buttons/examples/html5/pdfOpen.html

https://datatables.net/examples/advanced_init/footer_callback.html

https://datatables.net/examples/advanced_init/row_callback.html

https://datatables.net/examples/data_sources/js_array

https://datatables.net/examples/server_side/object_data.html
https://datatables.net/examples/ajax/objects.html
https://datatables.net/examples/api/select_row.html
https://datatables.net/examples/api/select_single_row.html
https://datatables.net/examples/ajax/objects_subarrays.html
==============================================
https://datatables.net/examples/styling/bootstrap
====================================================
Flat array data source
When loading data from an Ajax source, by default, DataTables will look for the data to use in the data parameter of a returned object (e.g. { "data": [...] }). This can easily be change by using the dataSrc option of the ajax initiation option.

The ajax.dataSrc has a number of ways in which it can be used:

https://datatables.net/examples/ajax/custom_data_flat.html

====================================================
Nested object data (objects)
DataTables has the ability to use data from almost any JSON data source through the use of the columns.data option. In its simplest case, it can be used to read arbitrary object properties, but can also be extended to n levels of nested objects / arrays through the use of standard Javascript dotted object notation. Each dot (.) in the columns.data option represents another object level.
https://datatables.net/examples/ajax/deep.html
====================================================
====================================================
====================================================
====================================================
====================================================
====================================================
====================================================
====================================================
OPTIONS

paging:false,
responsive: true,
"pageLength": 50,

,
        "pageLength": 20,
        "deferRender": true,
        "processing": true