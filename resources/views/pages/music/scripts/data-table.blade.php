<link rel="stylesheet" type="text/css" href="/js/tables/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="/js/tables/dataTables.bootstrap.min.css" />
<script type="text/javascript" src="/js/tables/datatables.min.js"></script>
<script type="text/javascript" src="/js/tables/dataTables.bootstrap.min.js"></script>

<style>
    body {
        background-color: white;
    }

    button {
        background-color: Transparent;
        background-repeat: no-repeat;
        border: none;
        cursor: pointer;
        overflow: hidden;
    }

    .tftable {
        font-size: 12px;
        color: #333333;
        width: 100%;
        border-width: 1px;
        border-color: #729ea5;
        border-collapse: collapse;
    }

    .tftable th {
        font-size: 12px;
        background-color: #acc8cc;
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #729ea5;
        text-align: left;
    }

    .tftable tr {
        background-color: #d4e3e5;
    }

    .tftable td {
        font-size: 12px;
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #729ea5;
    }

    .tftable tr:hover {
        background-color: #ffffff;
    }
</style>

<script>
    $(document).ready(function() {

        var t = $('#songs').DataTable({
            "lengthMenu": [
                [10, 15, 25, 50, 100, -1],
                [10, 15, 25, 50, 100, "All"]
            ],
            "iDisplayLength": 15,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "pagingType": "full_numbers",
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            "order": [
                [1, 'asc']
            ]
        });

        t.on('order.dt search.dt', function() {
            t.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        var a = $('#albums').DataTable({
            "lengthMenu": [
                [10, 15, 25, 50, 100, -1],
                [10, 15, 25, 50, 100, "All"]
            ],
            "iDisplayLength": 15,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "pagingType": "full_numbers",
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            "order": [
                [1, 'asc']
            ]
        });

        a.on('order.dt search.dt', function() {
            a.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        var p = $('#playlists').DataTable({
            "lengthMenu": [
                [10, 15, 25, 50, 100, -1],
                [10, 15, 25, 50, 100, "All"]
            ],
            "iDisplayLength": 15,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "pagingType": "full_numbers",
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            "order": [
                [1, 'asc']
            ]
        });

        p.on('order.dt search.dt', function() {
            p.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        var e = $('#eventos').DataTable({
            "lengthMenu": [
                [10, 15, 25, 50, 100, -1],
                [10, 15, 25, 50, 100, "All"]
            ],
            "iDisplayLength": 15,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "pagingType": "full_numbers",
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            "order": [
                [1, 'asc']
            ]
        });

        e.on('order.dt search.dt', function() {
            e.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

    });
</script>