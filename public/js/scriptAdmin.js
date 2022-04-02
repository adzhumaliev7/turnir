
$(document).on('click', '.datepickerInput', function (event) {
    var myDatepicker = $(event.target).datepicker({
        timepicker: true,
        clearButton: true,
        minDate: new Date(),
        dateTimeSeparator: " "
    }).data('datepicker');

    myDatepicker.show();
});

$('input[name="start_reg"]').datepicker({
    timepicker: true,
    clearButton: true,
    minDate: new Date(),
    dateTimeSeparator: " "
});

$('input[name="end_reg"]').datepicker({
    timepicker: true,
    clearButton: true,
    minDate: new Date(),
    dateTimeSeparator: " "
});

$('input[name="date"]').datepicker({
    timepicker: true,
    clearButton: true,
    minDate: new Date(),
    dateTimeSeparator: " "
});
$('input[name="tournament_start"]').datepicker({
    timepicker: true,
    clearButton: true,
    minDate: new Date(),
    dateTimeSeparator: " "
});
//Не из заявок
function format ( d ) {
    let turnirId = $('.teamTable').data('turnirid')
    let teamId = d.id
    console.log(d)
    if( d.members.length) {
        let tr = ''
        for (index = 0; index < d.members.length ?? []; ++index) {
            tr += ` <tr>
                        <td>${d.members[index].user.name} </td>
                        <td><input type="checkbox" name="members[]" value="${d.members[index]['user_id']}"></td>
                    </tr`
        }
        // `d` is the original data object for the row
        return `<form method="POST" action="/admin_panel/team/join/${turnirId}/${teamId}" >
                    <input type="hidden" name="_token" value="${$('meta[name="_token"]').attr('content')}">
                    <table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">
                        ${tr}
                    </table>
                    <button type="btn" class="btn btn-success mt-4">Сохранить</button>
                </form>`
    } else {
        return 'Нет участников'
    }
}

$('.teamTable').on('click', 'tbody td.dt-control', function () {
    var tr = $(this).closest('tr');
    var row = teamTable.row( tr );

    if ( row.child.isShown() ) {
        // This row is already open - close it
        row.child.hide();
    }
    else {
        // Open this row
        row.child( format(row.data()) ).show();
    }
} );

$('.teamTable').on('requestChild.dt', function(e, row) {
    row.child(format(row.data())).show();
})

let teamTable = $('.teamTable').DataTable({
    "responsive": true,
    "autoWidth": false,
    "processing": true,
    "serverSide": true,
    "rowId": 'id',
    "ajax":{
        "url": $('.teamTable').data('url'),
        "data": {"turnirId": $('.teamTable').data('turnirid')},
    },
    "columns": [
        {
            "className":      'dt-control',
            "orderable":      false,
            "data":           null,
            "defaultContent": ''
        },
        { "data": "id" },
        { "data": "name" },
        { "data": "nameCapitane" }
    ],
    "order": [[1, 'asc']]
});
// /Не из заявок



$('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
    $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
} );

var table = $('#example').DataTable();

$('#example tbody').on( 'click', 'tr', function () {
    $(this).toggleClass('selected');
} );

$('#button').click( function () {
    let group_id = $('#group_id').val()

    let teams = []
    for (index = 0; index < table.rows('.selected').data().length; ++index) {
        teams.push(table.rows('.selected').data()[index][0])
    }

    $.ajax({
        url: $('#example').data('url'),
        method: "POST",
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        data: {"group_id": group_id,"teams": teams},
        success: function(data) {
            window.location.reload ()
        }
    })

    console.log( table.rows('.selected').data())
} );



$('#addMatches').on('click', (ev) => {
    let matches = $('.matches').last();
    let count = 1;
    if(matches.length != 0)  {
        count = matches.data().matches + 1
    }


    let html = `

                 <div class="matches" data-matches="${count}">
                    <h4>Матч ${count}</h4>
                    <div class="form-row">

                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Название матча</label>
                            <input type="text" name="matches[${count}][match_name]" class="form-control" placeholder="Введите название матча" value="Матч ${count}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Login</label>
                            <input type="text" name="matches[${count}][login]" class="form-control" placeholder="Введите Login матча" value="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Password</label>
                            <input type="text" name="matches[${count}][password]" class="form-control" placeholder="Введите пароль матча" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Дата</label>
                            <input type="text" name="matches[${count}][date]" class="form-control datepickerInput datepicker-here" placeholder="Дата матча" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4"></label>
                            <span class="btn btn-danger form-control deleteMatches2">Удалить матч</span>
                        </div>
                    </div>
                </div>

              `
    $('#wrapMatches').append(html)

})
let ids = [];
$('.deleteMatches').on('click', (ev) => {
    let id = ev.target.dataset.matchesid;
    ids.push(id);
    let elem = $('#deletedIds').val(JSON.stringify(ids));
    console.log(elem)
    console.log(id)
    ev.target.parentNode.parentNode.parentNode.remove()
})

$(document).on('click', '.deleteMatches2',(ev) => {
    ev.target.parentNode.parentNode.parentNode.remove()
})

$('.demosdsdsd').dropdown({
    input:'<input type="text" maxLength="20" placeholder="Поиск">',
    searchNoData: '<li style="color:#ddd">Нет результатов</li>',
});

$(document).ready(function(){
    $('#search').on('keyup', function(){
        var query = $($this).val();
        $.ajax({
            url:"search",
            type:"GET",
            data:{'search':query},
            success:function(data){
                $('#search_result').html(data);
            }
        });
    });
});


$(".allTeamTable").DataTable({
    "responsive": true,
    "autoWidth": false,
    "processing": true,
    "serverSide": true,
    "rowId": 'id',
    "ajax":{
        "url": $('.allTeamTable').data('url'),
    },
    "columns": [
        { "data": "id" },
        { "data": "name" },
        { "data": "teammates_team_count" },
        { "data": "lastDate" },
        { "data": "order_count" },
        { "data": "teamLid" },
        { "data": "emailTeamLid" },
        { "data": "options" },

    ],
    "order": [[1, 'asc']]
});


$(".turnirTable").DataTable({
    "responsive": true,
    "autoWidth": false,
    "processing": true,
    "serverSide": true,
    "rowId": 'id',
    "ajax":{
        "url": $('.turnirTable').data('url'),
    },
    "columns": [
        { "data": "id" },
        { "data": "name" },
        { "data": "format" },
        { "data": "tournament_start" },
        { "data": "members" },
        { "data": "status" },
        { "data": "options" },
    ],
    "order": [[1, 'asc']]
});
console.log( $('.getDataUserAllList').data('filter'))
$(".getDataUserAllList").DataTable({
    "responsive": true,
    "autoWidth": false,
    "processing": true,
    "serverSide": true,
    "rowId": 'id',
    "ajax":{
        "url": $('.getDataUserAllList').data('url'),
        "data": { 'verification': $('.getDataUserAllList').data('filter')},
    },
    "columns": [
        { "data": "id" },
        { "data": "name" },
        { "data": "nickname" },
        { "data": "email" },
        { "data": "status" },
        { "data": "game_id" },
        { "data": "team"},
        { "data": "options" },
    ],
    "order": [[1, 'asc']]
});
