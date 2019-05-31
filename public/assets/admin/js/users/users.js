var mods_table = null;
var users_table = null;
var applicants_table = null;

var Users = (function () {
  var handleTables = function () {
    users_table = $("#users-datatable").DataTable();  
    applicants_table = $("#applicants-datatable").DataTable();  
  }

  var handleConfirmation = function () {
    $('[data-confirmation="notie"]').on('click', function () {
      $this = $(this)
      notie.confirm('Are you sure?', 'Yes! Delete this User', 'Cancel', function () {
        deleteUser($this)
      })
      return false
    })
  }

  var deleteUser = function ($this) {
    var url = $this.attr('href')
    var token = $this.data('token')
    console.log(url)
    $.ajax({
      type: 'POST',
      data: {_method: 'delete', _token: token},
      url: url,
      success: function (data) {
        toastr['success']('User Deleted', 'Success')
        Window.setTimeout('location.reload()', 500)
      },
      error: function (data) {
        toastr['error']('There was an error', 'Error')
      }
    })
  }

  return {
    // main function to initiate the module
    init: function () {
      handleTables()
      handleConfirmation()
    }
  }
})()

jQuery(document).ready(function () {
  Users.init()
})
