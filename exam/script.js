function add(){
  let name = $('#name').val();
  let email = $('#email').val();
  let msg = $('#zinojums').val();
  let form = $('div[name="output"]');

  $.ajax({
      url: "./controller.php",
      type: "POST",
      dataType: "json",
      data: {name: name, email: email, msg: msg},
      success: function(result){
          console.log(result);
          if(result.msg == ''){
              $('#errName').text(result.errName);
              $('#errEmail').text(result.errEmail);
              $('#errZinojums').text(result.errZinojums);
              $('#msg').text('');
          }else{
              $('#msg').text(result.msg);
              $('#errUser').text('');
              $('#errEmail').text('');
              $('#errZinojums').text('');

              form.append(`
              <div class = "yes">
                <p>`+name+`(`+email+`)</p>
                <p>`+msg+`</p>
                </div>
            `);
          }
      },
      error: function(error){
          console.log(error.responseText);
      }
  });
}

$(document).ready(function() {
    fetchDataAndPopulateTable();

    $('#search').on('input', function() {
        let searchTerm = $(this).val().toLowerCase();
        filterTable(searchTerm);
    });

    // Handle sorting by different columns
    $('#sortUser').on('click', function() {
        sortTable('name');
    });

    $('#sortEmail').on('click', function() {
        sortTable('email');
    });

    $('#sortDate').on('click', function() {
        sortTable('date_added');
    });
});

function fetchDataAndPopulateTable() {
    $.ajax({
        url: 'fetch_records.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            createTableHeader();
            populateTable(data);
        },
        error: function(error) {
            console.error('Datu iegūšanas kļūda:', error);
        }
    });
}