<!-----  https://datatables.net/examples/ajax/objects_subarrays.html--->
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">

<script  src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>


<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "ajax": "../data/objects_subarrays.txt",
        "columns": [
            { "data": "name[, ]" },
            { "data": "hr.0" },
            { "data": "office" },
            { "data": "extn" },
            { "data": "hr.2" },
            { "data": "hr.1" }
        ]
    } );
} );

</script>