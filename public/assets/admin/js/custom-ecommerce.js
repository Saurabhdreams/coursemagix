"use strict";

$(function ($) {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  /* ***************************************************************
  ==========disabling default behave of form submits start==========
  *****************************************************************/
  $("#ajaxEditForm").attr('onsubmit', 'return false');
  $("#ajaxForm").attr('onsubmit', 'return false');
  $(".modalform").attr('onsubmit', 'return false');
  /* *************************************************************
  ==========disabling default behave of form submits end==========
  ***************************************************************/

  // make any post as a featured post or not.
  $(document).on('change', '.featured-portfoliCat', function () {
    $('.request-loader').addClass('show');
    let catInfo = $(this).data();
    $("#featuredPortfoliCat" + catInfo.data).submit();
  });


  // get subcategory for item insert
  $(document).on('change', '.getSubCategory', function () {
    let url = $("#subcatGetterForItem").attr('value');
    let id = $(this).val();
    let code = $(this).data('code');

    var formData = new FormData();
    formData.append('url', url);
    formData.append('category_id', id);
    formData.append('code', code);
    $.ajax({
      url: url,
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        jQuery("#" + code + '_subcategory').empty();
        jQuery.each(response.subcategories, function (key, value) {
          jQuery("#" + code + '_subcategory').append('<option value="' + value.id + '">' + value.name + '</option>')
        });
      },
      error: function (data) {
        console.log('Error......');
      }
    });
  });

  // Language wise Category 
  $('.category_language').on('change', function () {
    $('.request-loader').addClass('show');
    // send ajax request to get all the categories of that selected language
    $.get(mainurl + "/user/subcategory/get-categories/" + $(this).val(), function (response) {
      console.log(response, "response")
      $('.request-loader').removeClass('show');
      if ('successData' in response) {
        $('select[name="category_id"]').removeAttr('disabled');
        let categoryData = response.successData;
        let markup = `<option selected disabled>Select a category</option>`;
        if (categoryData.length > 0) {
          for (let index = 0; index < categoryData.length; index++) {
            markup += `<option value="${categoryData[index].id}">${categoryData[index].name}</option>`;
          }
        } else {
          markup += `<option>No Category Exist</option>`;
        }
        $('select[name="category_id"]').html(markup);
      } else {
        alert(response.errorData);
      }
    });
  });








  // flash Sale form 
  $(document).on('click', '.submitBtn', function (e) {
    $(e.target).attr('disabled', true);
    var $id = $(this).attr('data-id')
    $(".request-loader").addClass("show");

    let modalform = document.getElementById('modalform' + $id);
    let fd = new FormData(modalform);
    let url = $("#modalform" + $id).attr('action');
    let method = $("#modalform" + $id).attr('method');

    $.ajax({
      url: url,
      method: method,
      data: fd,
      contentType: false,
      processData: false,
      success: function (data) {

        // console.log(data, 'success', typeof data.error);
        $(e.target).attr('disabled', false);
        $(".request-loader").removeClass("show");

        $(".em").each(function () {
          $(this).html('');
        })

        if (data == "success") {

          location.reload();
        }
        // if error occurs
        else if (typeof data.error != 'undefined') {

          for (let x in data) {
            if (x == 'error') {
              continue;
            }
            $("#modalform" + $id).find('#err' + x).text(data[x][0]);
          }
        }
      },
      error: function (error) {

        $(".em").each(function () {
          $(this).html('');
        })
        console.log(error.responseJSON.errors);
        for (let x in error.responseJSON.errors) {
          $("#modalform" + $id).find('#err' + x).text(error.responseJSON.errors[x][0]);
        }
        $(".request-loader").removeClass("show");
        $(e.target).attr('disabled', false);
      }
    });
  });


  // flash sale model  active / deactive

  $(document).on('change', '.manageFlash', function (e) {
    var $val = $(this).val()
    // $(".request-loader").addClass("show");
    var $itemId = $(this).attr('data-item-id')
    if ($val == 0) {
      let url = $("#flashForm" + $itemId).attr('action');
      let method = $("#flashForm" + $itemId).attr('method');
      console.log(url)
      $.ajax({
        url: url,
        method: method,
        data: { itemId: $itemId, val: $val },
        success: function (data) {
          if (data == "success") {
            location.reload();
          }
        },
        error: function (error) {
          $(".request-loader").removeClass("show");
        }
      });
    } else {
      $("#flashmodal" + $itemId).modal('show')
    }
  });



  // insertitem 
  $('#itemForm').on('submit', function (e) {
    $('.request-loader').addClass('show');
    e.preventDefault();

    let action = $('#itemForm').attr('action');
    let fd = new FormData(document.querySelector('#itemForm'));

    $.ajax({
      url: action,
      method: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      success: function (data) {
        console.log('Post Form', data);
        $('.request-loader').removeClass('show');
        // location.reload();
        if (data == 'success') {
          window.location = fullUrl;
        }
      },
      error: function (error) {
        $('#postErrors').show();
        let errors = ``;

        for (let x in error.responseJSON.errors) {
          errors += `<li>
              <p class="text-danger mb-0">${error.responseJSON.errors[x][0]}</p>
            </li>`;
        }

        $('#postErrors ul').html(errors);

        $('.request-loader').removeClass('show');

        $('html, body').animate({
          scrollTop: $('#postErrors').offset().top - 100
        }, 1000);
      }
    });
  });
});
