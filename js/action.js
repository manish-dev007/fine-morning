var result = '';
var currentLocation = window.location;
var proName = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
var a = btoa(proName); 
var charactersLength = proName.length;
for ( var i = 0; i < charactersLength; i++ ) {
    result += proName.charAt(Math.floor(Math.random() * charactersLength))+a;
}

$("#registration-form #uphone").on("keypress keyup blur", function (event) {
  $(this).val($(this).val().replace(/[^\d].+/, ""));
  if ((event.which < 48 || event.which > 57)) {
    event.preventDefault();
  }
  if ($("#registration-form #uphone").val().length > 9 ) {
    event.preventDefault();
  }
});


$('.login-user input[name=user-mobile]').on("keypress keyup blur", function (event) {
  $(this).val($(this).val().replace(/[^\d].+/, ""));
  if ((event.which < 48 || event.which > 57)) {
    event.preventDefault();
  }
  if ($('.login-user input[name=user-mobile]').val().length > 9 ) {
    event.preventDefault();
  }
});

$(".register_user input[name=phone]").on("keypress keyup blur", function (event) {
  $(this).val($(this).val().replace(/[^\d].+/, ""));
  if ((event.which < 48 || event.which > 57)) {
    event.preventDefault();
  }
  if ($(".register_user input[name=phone]").val().length > 9 ) {
    event.preventDefault();
  }
});

$(".forgot-pwd-user input[name=user-mobile]").on("keypress keyup blur", function (event) {
  $(this).val($(this).val().replace(/[^\d].+/, ""));
  if ((event.which < 48 || event.which > 57)) {
    event.preventDefault();
  }
  if ($(".forgot-pwd-user input[name=user-mobile]").val().length > 9 ) {
    event.preventDefault();
  }
});

$("#popupwindow input[name=phhone_news]").on("keypress keyup blur", function (event) {
  $(this).val($(this).val().replace(/[^\d].+/, ""));
  if ((event.which < 48 || event.which > 57)) {
    event.preventDefault();
  }
  if ($("#popupwindow input[name=phhone_news]").val().length > 9 ) {
    event.preventDefault();
  }
});

$(".newsletter-form input[name=phhone_news]").on("keypress keyup blur", function (event) {
  $(this).val($(this).val().replace(/[^\d].+/, ""));
  if ((event.which < 48 || event.which > 57)) {
    event.preventDefault();
  }
  if ($(".newsletter-form input[name=phhone_news]").val().length > 9 ) {
    event.preventDefault();
  }
});



$(".newsletter-form").submit(function(e) {
    e.preventDefault(); 

    var phone = $('.newsletter-form input[name=phhone_news]').val();
    var url = 'dashboard/api/newsletter.php';
    if(!$('.newsletter-form input[name=phhone_news]').val().match('[0-9]{10}'))  {
        alert("Please put 10 digit mobile number");
        return;
    }else{

      var userdata = {
            phone:phone,
        }
      
      $.ajax({
             type: "POST", 
             url: url,
             data: JSON.stringify(userdata),
             dataType: 'json',
             contentType: 'application/json',
             success: function(response)
             {
              if (response.ResponseCode == '401') {
                  alert(response.ResponseMsg);
              }
              if (response.ResponseCode == '200') {
                alert(response.ResponseMsg);
                popupSession();  
                window.location.href = currentLocation; 
              }
                  
             }

           });
      
    }
});
$(".popup-form").submit(function(e) {
    e.preventDefault(); 

    var phone = $('.popup-form input[name=phhone_news]').val();
    var url = 'dashboard/api/newsletter.php';
    if(!$('.popup-form input[name=phhone_news]').val().match('[0-9]{10}'))  {
        alert("Please put 10 digit mobile number");
        return;
    }else{

      var userdata = {
            phone:phone,
        }
      
      $.ajax({
             type: "POST", 
             url: url,
             data: JSON.stringify(userdata),
             dataType: 'json',
             contentType: 'application/json',
             success: function(response)
             {
              if (response.ResponseCode == '401') {
                  alert(response.ResponseMsg);
              }
              if (response.ResponseCode == '200') {
                alert(response.ResponseMsg); 
                popupSession();  
                window.location.href = currentLocation; 
              }
                  
             }

           });
  }
});

function popupSession(){
  $.ajax({
    type: "POST", 
    url: 'include/action?id=popup-session',
    success: function(response){
      console.log(response);
    }              
  }); 
}

$("#contact_form").submit(function(e) {
  e.preventDefault(); 

  var name = $('input[name=name]').val();
  var email = $('input[name=email]').val();
  var phone = $('input[name=phone]').val();
  var subject = $('input[name=subject]').val();
  var message = $('.message_contact').val();
  if(!$('input[name=phone]').val().match('[0-9]{10}'))  {
    alert("Please put 10 digit mobile number");
    return;
}else if(name == ''){
  alert("Please Enter Name");
  $('input[name=name]').focus();
}else{

  var url = 'dashboard/api/contact_form.php';

    var userdata = {
          name:name,
          email:email,
          phone:phone,
          subject:subject,
          message:message,
      }
      $.ajax({
           type: "POST", 
           url: url,
           data: JSON.stringify(userdata),
           dataType: 'json',
           contentType: 'application/json',
           success: function(response)
           {
            console.log(response);
                alert(response.ResponseMsg);
                window.location.href = currentLocation 
           }

         });
  }

});

$(".forgot-pwd-user").submit(function(e) {
    e.preventDefault(); 

    var email = $('input[name=user-email]').val();
    var url = 'include/action?id=forgot-pwd';
    var action = 'forgot-pwd';
    var uname = 'User';

            $.ajax({
             type: "POST", 
             url: url,
             data: {"action":action,"email":email},
             success: function(response)
             {
              var duces = JSON.parse(response);

                if (duces.ResponseCode == '200') {
                  alert(duces.ResponseMsg);
                  $('.err_msg').html('<span style="color:green;">'+duces.ResponseMsg+'</span>');

                }
                if (duces.ResponseCode == '401') {
                  alert(duces.ResponseMsg);
                  $('.err_msg').html('<span style="color:red;">'+duces.ResponseMsg+'</span>');
                }
             }

           });

});

$(".set-new-pwd-user").submit(function(e) {
    e.preventDefault(); 

    var token_auth = $('input[name=token-auth]').val();
    var token_email = $('input[name=token-email]').val();
    var newpwd = $('input[name=newpwd]').val();
    var cpwd = $('input[name=cpwd]').val();
    var url = 'dashboard/api/forgot.php';
    if (newpwd != cpwd) {
      alert('Password and Confirm password Should Match');
      $('input[name=cpwd]').focus();
    }else{
        var userdata = {
            token_auth: token_auth,
            token_email:token_email,
            newpwd:newpwd,
            cpwd:cpwd,
        }
      
      $.ajax({
             type: "POST", 
             url: url,
             data: JSON.stringify(userdata),
             dataType: 'json',
             contentType: 'application/json',
             success: function(response)
             {
                if (response.ResponseCode == '200') {
                  alert(response.ResponseMsg);
                  window.location.href = 'login';
                }
                if (response.ResponseCode == '401') {
                  alert(response.ResponseMsg);
                }
             }

           });
    }


});


  $(".register_user").submit(function(e) {
    e.preventDefault(); 

    var fname = $('input[name=first-name]').val();
    var lname = $('input[name=last-name]').val();
    var email = $('input[name=email-addr]').val();
    var phone = $('input[name=phone]').val();
    var pwd = $('input[name=password]').val();
    var area = $('.select_area_reg').val();
    var confirm_pwd = $('input[name=confirm-pwd]').val();
    if(!$('input[name=phone]').val().match('[0-9]{10}'))  {
      alert("Please put 10 digit mobile number");
      return;
  }else if (confirm_pwd == '') {
      alert('Please Enter password Again..!');
      $('input[name=confirm-pwd]').focus();
    }if (pwd != confirm_pwd) {
      alert('Password and Confirm password Should Match');
      $('input[name=confirm-pwd]').focus();
    }else{
      var uname = fname+" "+lname;
      var url = 'dashboard/api/register.php';

      var userdata = {
            name: uname,
            email:email,
            mobile:phone,
            area:area,
            password:pwd,
        }
      
      $.ajax({
             type: "POST", 
             url: url,
             data: JSON.stringify(userdata),
             dataType: 'json',
             contentType: 'application/json',
             success: function(response)
             {
                if (response.ResponseCode == '200') {
                  alert(response.ResponseMsg);
                  window.location.href = 'activation';
                }
                if (response.ResponseCode == '401') {
                  alert(response.ResponseMsg);
                }
             }
           });
    }
    
});


  $(".VERIFY_user").submit(function(e) {
    e.preventDefault(); 

    var otp = $('input[name=otp_validate]').val();
    var mail = $('input[name=hiddenmail]').val();

      var url = 'dashboard/api/verfiy_user.php';
      var userdata = {
            otp:otp,
            mail:mail,
        }
      $.ajax({
             type: "POST", 
             url: url,
             data: JSON.stringify(userdata),
             contentType: 'application/json',
             success: function(response)
             {
                var duce = jQuery.parseJSON(response);
                if (duce.ResponseCode == '200') {
                  var name = duce.user.name;var email = duce.user.email;var uid = duce.user.id;var mobile = duce.user.mobile;
                  makeLogin(mobile,email,name,uid);
                }
                if (duce.ResponseCode == '401') {
                  alert(duce.ResponseMsg);
                }
             }
           });
});

$(".login-user").submit(function(e) {
    e.preventDefault(); 

    var mobile = $('input[name=user-mobile]').val();
    var pwd = $('input[name=password]').val();
    if(!$('input[name=user-mobile]').val().match('[0-9]{10}'))  {
      alert("Please put 10 digit mobile number");
      return;
  }else{

      var url = 'dashboard/api/login.php';
      var userdata = {
            mobile:mobile,
            password:pwd,
            imei:'imei',
        }
      $.ajax({
             type: "POST", 
             url: url,
             data: JSON.stringify(userdata),
             contentType: 'application/json',
             success: function(response)
             {
                var duce = jQuery.parseJSON(response);
                if (duce.ResponseCode == '200') {
                  var name = duce.user.name;var email = duce.user.email;var uid = duce.user.id;
                  makeLogin(mobile,email,name,uid);
                }
                if (duce.ResponseCode == '401') {
                  alert(duce.ResponseMsg);
                }
             }
           });
  }
    
});


function makeLogin(mobile,email,name,uid){

  $.ajax({
             type: "POST", 
             url: 'include/action?id=login-user',
             data: {"mobile":mobile,"email":email,"name":name,"uid":uid},
             success: function(response)
             {
              //console.log(response);
                if (response == 'y') {
                  window.location.href = currentLocation;
                }
             }
           });
}


function getOrderHistory(){
    var uid = $('.hiddenuId').val();

    var userdata = {
            uid: uid,
        }

  $.ajax({
        type: "POST", 
        url: 'dashboard/api/history.php',
        data: JSON.stringify(userdata),
        dataType: 'json',
        contentType: 'application/json',
        success: function(response){
          var prnt = prnt_m = '';
          if (response.ResponseCode == '200') {
             var resp = response.Data;
             $.each(resp, function(i, item) {
              var o_status = '';
              if (item.status == 'completed') {
                o_status = '<span class="badge badge-success">'+item.status+'</span>';
              }else if (item.status == 'pending') {
                o_status = '<span class="badge badge-warning">'+item.status+'</span>';
              }else if (item.status == 'cancelled') {
                o_status = '<span class="badge badge-danger">'+item.status+'</span>';
              }
              var payment_info = '<li class="col-sm-3"><h6>'+item.p_method+'</h6></li>';


              prnt += '<ul class="row"><li class="col-sm-3 text-left"><h6>'+item.oid+'</h6></li><li class="col-sm-2 text-left"><h5 class="order_date">'+item.order_date+'</h5></li>'+payment_info+'<li class="col-sm-2"><h6>₹ '+item.total+'</h6></li><li class="col-sm-2"><h6>'+o_status+'</h6><span class="info_more" onclick=getOrderInfo("'+item.oid+'");>Info</span></li><li class="col-sm-1"></li></ul>';


              prnt_m += '<ul> <li><p class="mob_oid">Order ID: <b>'+item.oid+'</b></p> <p class="mob_status">'+o_status+'</p><p class="mob_price"><b>₹ '+item.total+'</b></p><p class="mob_more"><span onclick=getOrderInfo("'+item.oid+'");>Info</span></p></li> </ul>';
              });
          }
          if (response.ResponseCode == '401') {
             prnt = '<p class="resp_text_not">'+response.ResponseMsg+'</p>';
          }
           
          $('.order_history_block').html(prnt);

          $('.o_history_mob').html(prnt_m);
        }
      });
}
$('.btn_add_new_item').click(function() {
  $('.add_new_adrs_form')[0].reset();
  $('#add_new-addr_modal .modal-header h5').text('Add New Address'); 
});


$(".add_new_adrs_form").submit(function(e) {
    e.preventDefault(); 

    var uid = $('.hiddenuId').val();
    var umob = $('.hiddenuMob').val();
    var fname = $('input[name=first-name]').val();
    var lname = $('input[name=last-name]').val();
    var state = $('input[name=state]').val();
    var city = $('input[name=city]').val();
    var landmark = $('input[name=landmark]').val();
    var adr_type = $('.select_adr_type').val();
    var address = $('input[name=address]').val();
    var pincode = $('input[name=pincode]').val();
    var adr_id = $('input[name=adr_id]').val();

      var uname = fname+" "+lname;
      var url = 'dashboard/api/address.php';

      var userdata = {
            uid: uid,
            name: uname,
            hno: address,
            society:city,
            area:state,
            pincode:pincode,
            type:adr_type,
            landmark:landmark,
            aid:adr_id,
        }
      
      $.ajax({
             type: "POST", 
             url: url,
             data: JSON.stringify(userdata),
             contentType: 'application/json',
             success: function(response)
             {
              //console.log(response);
              var duce = jQuery.parseJSON(response);
              
                if (duce.ResponseCode == '200') {
                  alert(duce.ResponseMsg);
                  $("#add_new-addr_modal .close").click();
                  getAddresHistory(uid);
                  getAddresHistoryCheckout(uid);
                }
                if (duce.ResponseCode == '401') {
                  alert(duce.ResponseMsg);
                } 
             }
           });
    
});


$('.add_new_adrs_form_guest').submit(function (e) {
    e.preventDefault(); 
    var first_name = $('.add_new_adrs_form_guest input[name="user-name"]').val();
    var cust_email = $('.add_new_adrs_form_guest input[name="cust-email"]').val();
    var cust_phone = $('.add_new_adrs_form_guest input[name="cust-phone"]').val();
    var cust_alt_phone = $('.add_new_adrs_form_guest input[name="cust-alt-phone"]').val();
    var city = $('.add_new_adrs_form_guest input[name="city"]').val();
    var state = $('.add_new_adrs_form_guest input[name="state"]').val();
    var landmark = $('.add_new_adrs_form_guest input[name="landmark"]').val();
    var address = $('.add_new_adrs_form_guest input[name="address"]').val();
    var address_type = $('.add_new_adrs_form_guest .select_adr_type').val();
    var pincode = $('.add_new_adrs_form_guest input[name="pincode"]').val();
    var cust_type = $('.add_new_adrs_form_guest input[name="hiddnCusttype"]').val();
    var url = 'dashboard/api/add_guest_cust.php';
  var userdata = {
            uname: first_name,
            cust_email: cust_email,
            cust_phone: cust_phone,
            cust_alt_phone:cust_alt_phone,
            city:city,
            state:state,
            landmark:landmark,
            address:address,
            pincode:pincode,
            cust_type:cust_type,
            address_type:address_type,
        }
      
      $.ajax({
             type: "POST", 
             url: url,
             data: JSON.stringify(userdata),
             contentType: 'application/json',
             success: function(response)
             {
              console.log(response);
              var duce = jQuery.parseJSON(response);
                if (duce.ResponseCode == '200') {
                  window.location.href = currentLocation;
                }
             }

           });
});

function getAddresHistory(uid){
    var userdata = {
            uid: uid,
        }

  $.ajax({
        type: "POST", 
        url: 'dashboard/api/alist.php',
        data: JSON.stringify(userdata),
        dataType: 'json',
        contentType: 'application/json',
        success: function(response){
          //console.log(response);
          var prnt = '';
          if (response.ResponseCode == '200') {
             var resp = response.ResultData;
             $.each(resp, function(i, item) {               
                prnt += '<div class="address_history_block"><p class="adr_name a1">'+item.name+'</p><div class="adr_name a4 dropdown"> <img src="img/menu_icon.png" class="icon-menu dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><div class="dropdown-menu" aria-labelledby="dropdownMenu2"> <button class="dropdown-item" type="button" onclick="getAdrById('+item.id+','+item.uid+');">Edit</button> <button class="dropdown-item" type="button">Delete</button></div></div><p class="adr_type">'+item.type+'</p><p class="adr_adrs">'+item.hno+','+item.society+',<br>'+item.landmark+','+item.area+' - '+item.pincode+'</p></div>';
              });
          }
          if (response.ResponseCode == '401') {
             prnt = '<p class="resp_text_not">'+response.ResponseMsg+'</p>';
          }
           
          $('.adr_block').html(prnt);
        }
      });
}


function getAdrById(adrId,Uid){
  var userdata = {
            aid: adrId,
            uid: Uid,
        }
      
  $.ajax({
        type: "POST", 
        url: 'dashboard/api/adr_fetch.php',
        data: JSON.stringify(userdata),
        contentType: 'application/json',
        success: function(response)
        {
          var duce = jQuery.parseJSON(response);
            if (duce.ResponseCode == '401') {
              alert('Address not Found..!');
            }
            if (duce.ResponseCode == '200') {
              $('#add_new-addr_modal').modal('show'); 
              $('#add_new-addr_modal .modal-header h5').text('Update Address'); 

              $('.hiddenuId').val(Uid);
              $('input[name=adr_id]').val(duce.ResultData[0].id);
              $('input[name=first-name]').val(duce.ResultData[0].name);
              $('input[name=last-name]').val('');
              $('input[name=state]').val(duce.ResultData[0].area);
              $('input[name=city]').val(duce.ResultData[0].society);
              $('input[name=landmark]').val(duce.ResultData[0].landmark);
              $('.select_adr_type').val(duce.ResultData[0].type);
              $('input[name=address]').val(duce.ResultData[0].hno);
              $('input[name=pincode]').val(duce.ResultData[0].pincode);
            }
        }
  });
  
}



$(".update_user_passswd").submit(function(e) {
    e.preventDefault(); 

    var uid = $('input[name=Uid]').val();
    var old_pwd = $('input[name=old_pwd]').val();
    var newpwd = $('input[name=newpwd]').val();
    var cpwd = $('input[name=cpwd]').val();
    if (newpwd != cpwd) {
      alert('New Password & Confirm Password should be same..!');
    }else{

    var url = 'dashboard/api/chnge_pwd.php';

      var userdata = {
            uid: uid,
            old_pwd: old_pwd,
            newpwd: newpwd,
            cpwd:cpwd,
        }
      
      $.ajax({
             type: "POST", 
             url: url,
             data: JSON.stringify(userdata),
             contentType: 'application/json',
             success: function(response)
             {
              //console.log(response);
              var duce = jQuery.parseJSON(response);
              
                if (duce.ResponseCode == '200') {
                  alert(duce.ResponseMsg);
                  window.location.href = 'profile';
                }
                if (duce.ResponseCode == '401') {
                  alert(duce.ResponseMsg);
                } 
             }
           });
    }
});

$(".update_user_acc").submit(function(e) {
    e.preventDefault(); 

    var uid = $('input[name=Uid]').val();
    var uname = $('input[name=user-name]').val();
    var email = $('input[name=email-addr]').val();
    var phone = $('input[name=phone]').val();
    if(!$('input[name=phone]').val().match('[0-9]{10}'))  {
      alert("Please put 10 digit mobile number");
      return;
  }else{

    var url = 'dashboard/api/profile_update.php';

      var userdata = {
            uid: uid,
            name: uname,
            email: email,
            phone:phone,
        }
      
      $.ajax({
             type: "POST", 
             url: url,
             data: JSON.stringify(userdata),
             contentType: 'application/json',
             success: function(response)
             {
              //console.log(response);
              var duce = jQuery.parseJSON(response);
              
                if (duce.ResponseCode == '200') {
                  alert(duce.ResponseMsg);
                  getProfileInfoId(uid);
                }
                if (duce.ResponseCode == '401') {
                  alert(duce.ResponseMsg);
                } 
             }
           });
  }
    
});

function getProfileInfoId(Uid){
  var userdata = {
            uid: Uid,
        }
      
  $.ajax({
        type: "POST", 
        url: 'dashboard/api/profile_info.php',
        data: JSON.stringify(userdata),
        contentType: 'application/json',
        success: function(response)
        {
          var duce = jQuery.parseJSON(response);
            if (duce.ResponseCode == '401') {
              alert(duce.ResponseMsg);
            }
            if (duce.ResponseCode == '200') {

              $('input[name=Uid]').val(duce.ResultData[0].id);
              $('input[name=user-name]').val(duce.ResultData[0].name);
              $('input[name=email-addr]').val(duce.ResultData[0].email);
              $('input[name=phone]').val(duce.ResultData[0].mobile);
            }
        }
  });
  
}


function addToCart(proId) {

  var pro_qty = $('.qty_inc #quantity').val();
  
  var pro_price = $('.hiddenprice-'+proId).val();

  var product_id = window.btoa(proId);

  var fd = new FormData();
    fd.append('product_id',product_id);
    fd.append('product_qty',pro_qty);
    fd.append('pro_price',pro_price);
    var subOld = $('.spN_subt b').text();

    var url = "include/action?id=add-to-cart";
    var action = 'add';var subT = pro_qty*pro_price;
    $.ajax({
           type: "POST", 
           url: url,
           data: fd,
           contentType: false,
           processData: false,
           success: function(response)
           {
              var duce = jQuery.parseJSON(response);
              if (duce.status == 'exist') {
                alert('Product Already Exists..!');
              }   
              if (duce.status == 'added') {
                $('.span_cart_num').text(Object.keys(duce.data).length);
                
              $('.add_crt_info').html('<a href="javascript:void(0);" class="btn btn_update_cart008" onclick=UpdatecartPros("'+proId+'",2); >Update Cart</a>');
                  var iteminfo = pro_qty+","+pro_price.replace( /₹/g, "");
                  getInstantcartitem(window.atob(product_id),iteminfo,action,subT);
                  $('.spN_subt b').text(parseInt(subT)+parseInt(subOld));
              }           
           }
         });
}


function addToCartPros(proId,proi) {

  var pro_qty = 1;
  var pro_price = $('.hiddenprice-'+proId).val();
  var action = 'add';
  var subT = 0;

  var product_id = window.btoa(proId);
  var fd = new FormData();
    fd.append('product_id',product_id);
    fd.append('product_qty',pro_qty);
    fd.append('pro_price',pro_price);

    var url = "include/action?id=add-to-cart";

    $.ajax({
           type: "POST", 
           url: url,
           data: fd,
           contentType: false,
           processData: false,
           success: function(response)
           {
              var duce = jQuery.parseJSON(response);
              if (duce.status == 'exist') {
                alert(duce.status);
              }   
              if (duce.cart_items == 2 || duce.cart_items == 1) {
                $('.dropdown-menu .head_drop_links .col-xs-12').html('<a href="checkout" class="btn">CHECK OUT</a>');
                $('.dropdown-menu .head_drop_subt').css('display','none');
              }
              if (duce.status == 'added') {
                $('.span_cart_num').text(Object.keys(duce.data).length); 
                var subTs = 0;
                $.each(duce.data, function(i, item) {  
                  subTs = item.itemqty;
                  var array = subTs.split(",");
                  var qty = array[0];
                  var price = array[1];
                  subT += parseInt(qty*price);
                });
                  var iteminfo = pro_qty+","+pro_price.replace( /₹/g, "");
                  $('.cart_subTval').val(subT); 
                  $('.spN_subt b').text(subT);
                  getInstantcartitem(window.atob(product_id),iteminfo,action,subT);
                  $('.add_more_cart_btn_bl_'+proId+' .btn_pro_add').css('display','none');
                  $('.add_more_cart_btn_bl_'+proId).append('<div class="add_more_input_inc"><input type="text" value="'+pro_qty+'" min="0" max="100" class="cls_add_more_item_cart_'+proId+'"/><div id="inc-button" class="spinner-button" onclick="addToCartProsInc('+proId+','+proi+');">+</div><div id="dec-button" class="spinner-button" onclick="addToCartProsDec('+proId+','+proi+');">-</div></div>');
                  $('.add_del_cart'+proi).html('<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Remove From Cart" onclick=delteHomeCart("'+window.btoa(proId)+'",'+proi+');><i class="icon-trash"></i></a>');
                  $('.del_sols_cart-'+proi).html('<a href="javascript:void(0);" onclick=delteHomeCart("'+window.btoa(proId)+'",'+proi+'); class="btn view_more add_cart_sols" data-toggle="tooltip" data-placement="top" title="Remove From Cart"><i class="icon-trash"></i> Remove from Cart</a>');
              }           
           }
         });
}

function delteHomeCart(proId,proi){
  var subT = $('.spn-0089').text();
  deletecartItem(proId,subT);    
  $('.add_del_cart'+proi).html('<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Add To Cart" onclick=addToCartPros('+window.atob(proId)+','+proi+');><i class="icon-basket"></i></a>  ');

  $('.del_sols_cart-'+proi).html('<a href="javascript:void(0);"  data-toggle="tooltip" data-placement="top" title="Add to Cart" onclick="addToCartPros('+window.atob(proId)+','+proi+');" class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to Cart</a>');
}

function addToCartProsInc(proId,proi) {
  var action = 'add';
  var pro_qty = $('.add_more_input_inc .cls_add_more_item_cart_'+proId).val();
  $('.add_more_input_inc .cls_add_more_item_cart_'+proId).val(parseInt(pro_qty)+parseInt(1));
  var pro_price = $('.product_price.pr-'+proId+' .price.pr_pro_'+proi).text();
  
  var new_qty = parseInt(pro_qty)+parseInt(1);
  updatecartItems(new_qty,proId,proi,action,pro_price);   
}

function addToCartProsDec(proId,proi) {
  var action = 'del';
  var pro_qty = $('.add_more_input_inc .cls_add_more_item_cart_'+proId).val();
  var pro_price = $('.product_price.pr-'+proId+' .price.pr_pro_'+proi).text();
  
  var new_qty = parseInt(pro_qty)-parseInt(1);
  if (new_qty < 1) {
    new_qty = 0;
    $('.add_more_input_inc .cls_add_more_item_cart_'+proId).val(new_qty);
    var subT = $('.spn-0089').text();

    deletecartItem(window.btoa(proId),subT);    
  }else{
    $('.add_more_input_inc .cls_add_more_item_cart_'+proId).val(parseInt(pro_qty)-parseInt(1));
    updatecartItems(new_qty,proId,proi,action,pro_price);  
  }
  
}

function UpdatecartPros(proId,proi) {
  var new_qty = $('.qty_inc .input-number').val();
  var pro_price = $('.pros_price .price span').text();
  var action = '';
  if (new_qty < 1) {
    var subT = $('.spn-0089').text();
    deletecartItem(window.btoa(proId),subT);
    action = 'del';
  }else{
    action = 'add';
    updatecartItems(new_qty,proId,proi,action,pro_price);
  }
}

function updatecartItems(new_qty,proId,proi,action,pro_price){
  var product_id = window.btoa(proId);
    var fd = new FormData();
    fd.append('product_id',product_id);
    fd.append('product_qty',new_qty);
    fd.append('pro_price',pro_price);
    $('.overlayLoad').show();
    var url = "include/action?id=update-to-cart";
    $.ajax({
           type: "POST", 
           url: url,
           data: fd,
           contentType: false,
           processData: false,
           success: function(response)
           {
               //console.log(response);
              var subTs = 0;var subT = 0;
              var duce = jQuery.parseJSON(response);
              var iteminfo = new_qty+","+pro_price.replace( /₹/g, "");
              $.each(duce.data, function(i, item) {  
                subTs = item.itemqty;
                var array = subTs.split(",");
                var qty = array[0];
                var price = array[1];
                subT += parseInt(qty*price);
              });
              var ship_c = $('.ship-charge-all').val();
              var o_min = $('.min_odr_ship').val();
              
              if (subT < o_min) {
                $('.spN_shipping_c b').text('₹'+ship_c);
              }else if (subT >= 500) {
                $('.spN_shipping_c b').text('₹0');
              }else{
                $('.spN_shipping_c b').text('₹'+(parseInt(ship_c)-20));
              }
              getInstantcartitem(window.atob(product_id),iteminfo,action,subT);
              $('.cartItem-'+proId).remove();
              $('.spN_subt b').text(subT);  
              $('.cart_subTval').val(subT); 
           }
         });
}


function getInstantcartitem(itemid,iteminfo,action,subT){

  var array = iteminfo.split(",");
  var qty = array[0];
  var price = array[1];
  var subT1 = qty*price;
  var subT_old = '';
   
  var dataspnSubT = $('.cart_subTval').val(); 

  if (dataspnSubT == '') {

    subT_old = 0;

  }else{

    subT_old = dataspnSubT;

  }
  //var tax_old = $('.total_b001 .spN_tax b').text();
  var pdata = {
    product_id: itemid,
  }
  var subTs = 0;
  var pid = window.btoa(itemid);
  //var total_tax = 0;
  $.ajax({
        type: "POST", 
        url: 'dashboard/api/fetch_cart_data.php',
        data: JSON.stringify(pdata),
        contentType: 'application/json',
        success: function(response){
         // console.log(response);
          $('.overlayLoad').hide();
          var duces = JSON.parse(response);
          var resp = duces.ResultData; var input_f = '';var input_chk = '';
          //console.log(response);
            $.each(resp, function(i, item) {    
              input_f += '<li class="cartItem-'+item.id+'"><div class="media-left"><div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="dashboard/'+item.pimg+'" alt="..."> </a></div></div><div class="media-body"><h6 class="media-heading">'+item.pname+' (₹ '+price+')</h6>  <span class="qty">QTY: <b>'+qty+'</b></span> <span class="price">Subtotal: ₹ '+subT1+'<i class="fa fa-trash" onclick=deletecartItem("'+pid+'",'+subT1+'); style="float: right;color: #af1a1a;cursor: pointer;" aria-hidden="true"></i></span></div></li>';
              subTs = 1*price;
              var rand_n = Math.floor(Math.random() * 6) + 1;
              //total_tax = item.ptax;
              input_chk += '<div class="checkout_pg_items"> <li class="cartItem-'+item.id+'"> <div class="media-left"> <div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="dashboard/'+item.pimg+'" alt="..."/> </a> </div></div><div class="media-body product_price pr-'+item.id+'"> <h5>'+item.pname+'</h5> <span class="price pr_pro_'+rand_n+'"><small>₹</small>'+price+'</span> <div class="add_more_input_inc"> <input type="text" value="'+qty+'" min="0" max="100" class="cls_add_more_item_cart_'+item.id+'"/> <div id="inc-button" class="spinner-button" onclick="addToCartProsInc('+item.id+','+rand_n+');">+</div><div id="dec-button" class="spinner-button" onclick="addToCartProsDec('+item.id+','+rand_n+');">-</div></div><br/> <p class="subtotal">Subtotal: <b>₹ '+subT1+'</b></p></div></li></div>';
            });
            /*var subtTax = 0;
            total_tax = parseInt(subTs*total_tax/100);
            if (action == 'add') {
              subtTax = parseInt(tax_old)+parseInt(total_tax);
              $('.total_b001 .spN_tax b').text(subtTax);
            }
            if (action == 'del') {
              subtTax = parseInt(tax_old)-parseInt(total_tax);
              $('.total_b001 .spN_tax b').text(subtTax);
            }          */  
            $('.user-basket .dropdown-menu').prepend(input_f);
            $('.checkout_order_detail').prepend(input_chk);

            var ship_c = $('.ship-charge-all').val();
            var o_min = $('.min_odr_ship').val();
              if (subT < o_min) {
                ship_c = ship_c;
              }else if (subT >= 500) {
                ship_c = 0;
              }else{
                ship_c = ship_c-20;
              }
            $('.spN_total_cost b').text(parseInt(subT)+parseInt(ship_c));
        }

  });
}


function getAddresHistoryCheckout(uid){
  var umob = $('.hiddenuMob').val();
    var userdata = {
            uid: uid,
        }
  $.ajax({
        type: "POST", 
        url: 'dashboard/api/alist.php',
        data: JSON.stringify(userdata),
        dataType: 'json',
        contentType: 'application/json',
        success: function(response){
          //console.log(response);
          var prnt = '';
          if (response.ResponseCode == '200') {
             var resp = response.ResultData;
             $.each(resp, function(i, item) {               
                prnt += '<div class="address_history_checkout_block"><label class="container_chk"><input type="radio" onclick="chkRadio('+item.pincode+');" name="radio_chk" value="'+item.id+'"><span class="checkmark"></span></label><div class="chk-adr"><p class="adr_name a1">'+item.name+'</p><p class="adr_type">'+item.type+'</p><p class="adr_adrs">'+item.hno+','+item.society+','+item.landmark+','+item.area+' - '+item.pincode+'</p></div></div>';
              });
          }
          if (response.ResponseCode == '401') {
             prnt = '<p class="resp_text_not">'+response.ResponseMsg+'</p>';
          }
           
          $('.adr_block_checkout').html(prnt);

          $(".adr_block_checkout").fadeIn(300);
          $(".form_add_addr_check").fadeOut(300);
          $(".add_new_adr_chk").css('display','block');
          $(".cancel_chk_adr").css('display','none');
        }
      });
}

$('.add_new_adr_chk').click(function() {
  $(".adr_block_checkout").fadeOut(300);
  $(".form_add_addr_check").fadeIn(300);
  $(".add_new_adr_chk").css('display','none');
  $(".cancel_chk_adr").css('display','block');
});

$('.cancel_chk_adr').click(function() {
  $(".adr_block_checkout").fadeIn(300);
  $(".form_add_addr_check").fadeOut(300);
  $(".add_new_adr_chk").css('display','block');
  $(".cancel_chk_adr").css('display','none');
});

function getPaymethod(){
  $.ajax({
        type: "POST", 
        url: 'dashboard/api/paymentgateway.php',
        success: function(response){
            var resp = response.data;  
            var input_f = '';
            $.each(resp, function(i, item) {    
              input_f += '<li><div class="radio"><input type="radio" name="check_pay_optino" id="'+item.id+'" value="'+item.title+'" checked><label for="radio2"> '+item.title+'</label></div></li>';
             
            });
            
            $('.pay_option').html(input_f);
        }
  });
}


getSettingData();
function getSettingData(){
  $.ajax({
        type: "POST", 
        url: 'dashboard/api/setting.php',
        success: function(response){
          var duces = JSON.parse(response);
          $('.o_min').val(duces.data[0].o_min);
          $('.address_comp').html(duces.data[0].contact_us);
          $('.privacy_page').html(duces.data[0].privacy_policy);
          $('.return_policy_page').html(duces.data[0].return_policy);
          $('.about_content').html(duces.data[0].about);
          $('.terms_Conditions').html(duces.data[0].terms);
        }
  });
}

$('.btn_odr_plc').click(function (e) {
  var total_a = $('.spN_total_cost b').text();
  var min_amt = $('.o_min').val();
  var pincode = $('.hiddnZip').val();
  if (parseInt(total_a) < parseInt(min_amt)) {
      alert('*Minimum Order Amount is '+min_amt);
  }else if (pincode == 0) {
      alert('*Address not Deliverable..!');
  }else if ($('.hiddenuId').val() == '') {
      alert('*Please Login First to Continue..!');
      window.location.href = 'login';
  }else if (!$('.adr_block_checkout input[name="radio_chk"]').is(":checked")) {
      alert('*Please Select an Address..!');
  }else if (!$('.pay-meth input[name="check_pay_optino"]').is(":checked")) {
      alert('*Please Select Pay Option..!');
  }else if (!$('input[name="check_terms"]').is(":checked")) {
      alert('*Please Select Terms and Conditions..!');
  }else{
      var address_id = $('.adr_block_checkout input[name="radio_chk"]:checked').val();
      var pay_option = $('.pay-meth .pay_option input[name="check_pay_optino"]:checked').val();
      var uid = $('.hiddenuId').val();
      
      var ship_charge = $('.ship-charge').val();
      var promo_c = $('.ship-charge').attr('data-val');



      var url = "include/action?id=cart_checkout";
      $.ajax({
             type: "POST", 
             url: url,
             success: function(response)
             {
              var duces = JSON.parse(response);
              var total_pr = 0;
              var pids = '';
              $.each(duces, function(i, item) {  
                total_pr += parseFloat(item.qty)*parseFloat(item.cost);
                pids += item.pid+",";
              });
                var userdata = {
                      pname: duces,
                      address_id: address_id,
                      p_method: pay_option,
                      uid: uid,
                      tid: '0',
                      total: total_pr,
                      promo_c: promo_c,
                      ship_charge: ship_charge,
                }
                if ($('.pay-meth input[name="check_pay_optino"]:checked').attr('id') == 1) {
                  $(".progrs_pay").fadeIn(300);
                  pay_online_process(userdata,total_a,pids)
                }else{
                  pay_cod_process(userdata,pids);
                }
                
             }
           });
  }

});

function pay_cod_process(userdata,pids){
  $.ajax({
    type: "POST", 
    url: 'dashboard/api/order.php',
    data: JSON.stringify(userdata),
    contentType: 'application/json',
    success: function(resp){
      var res_f = JSON.parse(resp);
      if (res_f.ResponseCode == '200') {
        alert(res_f.ResponseMsg);
        var odr_id = res_f.oid;
        sendBookingConfirmation(odr_id);
        unsetProCookies(pids);
      }else{
        alert('Error Occured');
      }
    }

  });
}

function pay_online_process(userdata,total_a,pids){
  $.ajax({
    type: "POST", 
    url: "include/action?id=cart_online_pay",
    data: {"udata":userdata,"pids":pids},
    success: function(response)
    {
        setTimeout(function(){ window.location = 'Payment/checkout/?paymentToken='+result+'&payment_amt='+window.btoa(total_a); }, 2000);
    }
  });

}

function sendBookingConfirmation(odr_id){
  var uemail = $('.hiddenueamil').val();
  var uid = $('.hiddenuId').val();
  var uname = $('.hiddenuname').val(); 
  

  $.ajax({
    type: "POST", 
    url: "include/action?id=booking_confirm_msg",
    data: {"oid":odr_id,"uid":uid,"uname":uname,'uemail':uemail},
    success: function(response)
    {
      var duces = JSON.parse(response);
      console.log(duces.ResultData);
    }
});



}

function unsetProCookies(pids){
    var url = "include/action?id=delete-cart-item-order";
    var pid = pids.slice(0,-1);
    var myarray = pid.split(',');

    for(var i = 0; i < myarray.length; i++)
    {
      $.ajax({
             type: "POST", 
             url: url,
             data: {"id":window.btoa(myarray[i])},
             success: function(response)
             {
                //console.log(response);
                setTimeout(function(){ window.location = 'order_history'; }, 2000);
             }

           });
    }
}

$('.select_pro-qty').change(function() {
    var sel_qty = $(this).val();
    var hiddennetwt = $('.hiddennetwt').val(); 
    var hiddenpprice = $('.hiddenpprice').val(); 


    var array1 = hiddennetwt.split("$;");
    var array2 = hiddenpprice.split("$;");
    if (sel_qty == array1[0]) {
      $('.pros_price .price').html('<small>₹</small>'+array2[0]);
    }
    if (sel_qty == array1[1]) {
      $('.pros_price .price').html('<small>₹</small>'+array2[1]);
    }

});


$('.searchItem').keyup(function(){
  $('.resultSearch').html('');
  var searchField = $('.searchItem').val();
    if (searchField == '') {
      $('.searchItem').val('');
    }else{
      var userdata = {
            item: searchField,
        }

  $.ajax({
        type: "POST", 
        url: 'dashboard/api/searchbar.php',
        data: JSON.stringify(userdata),
        dataType: 'json',
        contentType: 'application/json',
        success: function(response){
              console.log(response);  
              var resultdata = '';   

              var prnt = '';
              if (response.ResponseCode == '200') {
                 var resp = response.ResultData;
                 $.each(resp, function(i, item) {               
                    prnt += '<li class="list-group-item link-class"><a href="products/"'+(item.url_slug)+'"><div class="img_list"><img src="dashboard/'+item.pimg+'" height="40" width="40" class="img-thumbnail" /></div><div class="pro_list_info"><p>'+item.pname+' <span class="text-muted"> <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></p></div></a></li>';
                  });
              }
              if (response.ResponseCode == '401') {
                 prnt = '<p class="resp_text_not">'+response.ResponseMsg+'</p>';
              }
               
              $('.resultSearch').html(prnt);
          }
      });
  }
 });

function deletecartItem(id,subT) {
  
  var cart_n = $('.span_cart_num').text();
  var total_cart = $('.cart_subTval').val();
  var fd = new FormData();
  fd.append('id',id);

    var url = "include/action?id=delete-cart-item";

    $.ajax({
           type: "POST", 
           url: url,
           data: fd,
           contentType: false,
           processData: false,
           success: function(response)
           {
            //console.log(response);
            var res_f = JSON.parse(response);

              $('.cartItem-'+window.atob(id)).remove();    
              if (cart_n >= 1) { $('.span_cart_num').text(cart_n-1);    } 
              var totl = parseInt(total_cart)-parseInt(res_f.total);
              $('.spN_subt').html('₹<b>'+totl+'</b>');     
              $('.cart_subTval').val(totl);     

              $('.add_more_cart_btn_bl_'+window.atob(id)+' .btn_pro_add').css('display','block');
              $('.add_more_cart_btn_bl_'+window.atob(id)+' .add_more_input_inc').remove();       

              var ship_ch = $('.ship-charge').val();
              var ship_c = $('.ship-charge-all').val();
              var o_min = $('.min_odr_ship').val();
                if (total_cart < o_min) {
                  $('.spN_shipping_c').text(ship_c); 
                  $('.spN_total_cost b').text(parseInt(total_cart)+parseInt(ship_ch));
                }else if (total_cart >= 500) {
                  $('.spN_shipping_c').text('0'); 
                  $('.spN_total_cost b').text(parseInt(total_cart));
                }else{
                  $('.spN_shipping_c').text(parseInt(ship_c)-20);
                  $('.spN_total_cost b').text((parseInt(total_cart)-parseInt(res_f.total))+parseInt(ship_ch));
                } 
                if (res_f.cart_items == '0') {
                  $('.shopping-cart').html('<div class="cart-err"><h3>You have no items in your Cart..!</h3><a href="products" class="btn  btn-dark margin-top-30">SHOP MORE</a></div>');
                  $('.dropdown-menu').html('<li><h5 class="text-center">NO Items in your Cart</h5></li><li class="margin-0"><div class="row"><div class="col-xs-12 "> <a href="products" class="btn">SHOP NOW</a></div></div></li>');
                }

                
           }
         });
}


$('.select_filter_price').change(function() {
  var sortingMethod = $(this).val();
  
  if(sortingMethod == 'l2h') {
    sortProductsPriceAscending();
  } else if (sortingMethod == 'h2l') {
    sortProductsPriceDescending();
  }else{

  }
});

function sortProductsPriceAscending() {
  var gridItems = $('.pros_item');
  gridItems.sort(function(a, b) {
    return $('.item', a).data("price") - $('.item', b).data("price");
  });

  $(".all_product_blk").append(gridItems);
}

function sortProductsPriceDescending() {
  var gridItems = $('.pros_item');

  gridItems.sort(function(a, b) {
    return $('.item', b).data("price") - $('.item', a).data("price");
  });

  $(".all_product_blk").append(gridItems);
}

function apply_promo(){
  var promo_code = $('.promo_chk').val();
  var uid = $('.hiddenuId').val();
  var userdata = {
          promo_code: promo_code,
          uid: uid,
        }

  $.ajax({
        type: "POST", 
        url: 'dashboard/api/fetch_promocode.php',
        data: JSON.stringify(userdata),
        dataType: 'json',
        contentType: 'application/json',
        success: function(response){
          console.log(response);
          if(response.ResponseCode == '200'){
             var total = $('.spN_total_cost b').text();
            var promo_val = parseInt(total*parseInt(response.ResultData[0].promo_value))/100;
            var final = parseInt(total)-promo_val;
            $('.promo_err').text('Promocode Applied');
            $('.promo_err').css('color','green');
            $('.total_shiping').append('<p class="total_b001 promo">Promocode Applied : <br><b>'+response.ResultData[0].promo_name+'</b><span class="spn-promo" style="color:red;">- ₹ <b>'+promo_val+'</b></span></p>');
            $('.btn_promo').html('<span>&nbsp; </span><a class="rem" href="javascript:void(0);" style="height: unset;width: unset;background: unset;color: red;font-size: 30px;float: left !important;padding: 15% 0;" class="btn pull-right" onclick="remove_promo();"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>');

            $('.spN_total_cost b').text(final);
            $('.ship-charge').attr('data-val',promo_val);
          }else{
            alert(response.ResponseMsg);
            $('.promo_err').text(response.ResponseMsg);
            $('.promo_err').css('color','red');
          }     
        }

      });
  }

  function remove_promo(){
    var promo_code = $('.promo_chk').val();
    var uid = $('.hiddenuId').val();
    var userdata = {
            promo_code: promo_code,
            uid: uid,
          }

    $.ajax({
          type: "POST", 
          url: 'dashboard/api/fetch_promocode.php',
          data: JSON.stringify(userdata),
          dataType: 'json',
          contentType: 'application/json',
          success: function(response){
            if(response.ResponseCode == '200'){
              $('.promo_err').text('');
              $('.promo_err').css('color','green');
              $('.total_b001 .promo').remove();
              $('.btn_promo').html('<span>&nbsp; </span><a href="javascript:void(0);" class="btn  btn-dark pull-right btn_aplyPromo" onclick="apply_promo();">Appply</a>');
              var total = $('.spN_total_cost b').text();
              var final = parseInt(total)+parseInt(response.ResultData[0].promo_value);
              $('.spN_total_cost b').text(final);
              $('.ship-charge').attr('data-val','0');
            }else{
              alert(response.ResponseMsg);
              $('.promo_err').text(response.ResponseMsg);
              $('.promo_err').css('color','red');
            }     
          }

        });
  }



  function check_pincode(){
  var zip_code = $('.zip_chk').val();
  var userdata = {
          promo_code: zip_code,
        }

  $.ajax({
        type: "POST", 
        url: 'dashboard/api/fetch_zipcode.php',
        data: JSON.stringify(userdata),
        dataType: 'json',
        contentType: 'application/json',
        success: function(response){
          console.log(response);
          if(response.ResponseCode == '200'){
            $('.zip_err').text(response.ResultData[0].serv);
            $('.zip_err').css('color','green');
          }else{
            $('.zip_err').text(response.ResponseMsg);
            $('.zip_err').css('color','red');
          }     
        }

      });
  }




function change_pros_net(id) {

    var net_q = $('.selpro-'+id).val(); 
    var hiddennetwt = $('.hiddennet-'+id).val(); 
    var hiddenpprice = $('.hiddenprice-'+id).val(); 


    var array1 = hiddennetwt.split("$;");
    var array2 = hiddenpprice.split("$;");
    if (net_q == array1[0]) {
      $('.pr_pro_'+id).html('₹'+array2[0]);
    }
    if (net_q == array1[1]) {
      $('.pr_pro_'+id).html('₹'+array2[1]);
    }

}


$('.add_more_input_inc ').click(function(e){
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());
          $('#quantity').val(quantity + 1);
        });

     $('.quantity-left-minus').click(function(e){
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });


$(document).ready(function(){

var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());
          $('#quantity').val(quantity + 1);
        });

     $('.quantity-left-minus').click(function(e){
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });
    
});
function chkRadio(pin) {
    $('html, body').animate({
        scrollTop: $(".cols_mob_odr").offset().top
    }, 1000);

    var userdata = {
          promo_code: pin,
        }

  $.ajax({
        type: "POST", 
        url: 'dashboard/api/fetch_zipcode.php',
        data: JSON.stringify(userdata),
        dataType: 'json',
        contentType: 'application/json',
        success: function(response){
          //console.log(response);
          if(response.ResponseCode == '200'){
            $('.hiddnZip').val(1);
          }else{
            alert(response.ResponseMsg);
          }     
        }

      });
}

function getOrderInfo(oid) {
  $(".o_history_details").fadeIn(300);
  $(".o_history_web").fadeOut(300);
  $(".o_history_mob").fadeOut(300);

  var uid = $('.hiddenuId').val();

  var userdata = {
            oid: oid,
            uid: uid,
        }
  $.ajax({
        type: "POST", 
        url: 'dashboard/api/search_order.php',
        data: JSON.stringify(userdata),
        contentType: 'application/json',
        success: function(response){
          //console.log(response);
          var prnt = '';
          var subTot = 0;
          var duce = jQuery.parseJSON(response);
          if (duce.ResponseCode == '200') {
            $('.o_history_details .oid b').text(duce.ResultData[0].oid);
            $('.o_history_details .odate b').text(duce.ResultData[0].order_date);
            $('.o_history_details .total_tax b').text(duce.ResultData[0].tax);
            $('.o_history_details .total_amt b').text(duce.ResultData[0].total);
            $('.o_history_details .p_method span').text(duce.ResultData[0].p_method);
            $('.o_history_details .o_staus span').text(duce.ResultData[0].status);
            $('.o_history_details .oaddress b').text(duce.ResultData[0].address_id);
            $.each(duce.ResultData[0].product_list, function(i, item) { 
              prnt += '<li class="cartItem-'+item.pid+'"> <div class="media-left"> <div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="dashboard/'+item.p_img+'" alt="..."> </a> </div> </div> <div class="media-body product_price pr-27"> <h5>'+item.p_name+' (₹ <span class="price pr_pro_66">'+item.price+'</span>)</h5> <span class="net_wt">Qty. : <b>'+item.qnty+'</b></span> <p class="subt">Subtotal: ₹ '+item.p_subtotal+'</p> </div> </li>';
              subTot += parseInt(item.p_subtotal);
            });
            prnt +='<li class="subTInfo"> <div class="media-left">Subtotal : </div><div class="media-right"><b>₹'+subTot+'</b></div></li><li class="subTInfo"> <div class="media-left">Total Tax : </div><div class="media-right"><b>₹'+duce.ResultData[0].tax+'</b></div></li><li class="subTInfo"> <div class="media-left">Shipping Charge : </div><div class="media-right"><b>₹'+duce.ResultData[0].ship_charge+'</b></div></li>';
            if (duce.ResultData[0].promocode != '') {
              prnt +='<li class="subTInfo"> <div class="media-left">Promocode Applied : </div><div class="media-right"><b style="color: red;">- ₹'+duce.ResultData[0].promocode+'</b></div></li>';
            }
            prnt +='<li class="subTInfo"> <div class="media-left"><h4>Total : </h4></div><div class="media-right"><h4><b>₹'+duce.ResultData[0].total+'</b></h4></div></li>';
            $('.o_history_details .checkout_pg_items ul').html(prnt);
            if(duce.ResultData[0].status == 'pending'){              
              var cancel_odr = '<a href="#" class="btn cancel_odr_btn" onclick=cancel_order("'+oid+'",'+uid+');>Cancel Order</a>';
              $('.o_staus').append(cancel_odr);
            }
          }else{
            alert(duce.ResponseMsg);
          }
        }

      });
}

function cancel_order(oid,uid){
  var userdata = {
    oid: oid,
    uid: uid,
  }
  $.ajax({
  type: "POST", 
  url: 'dashboard/api/cancel-odr.php',
  data: JSON.stringify(userdata),
  contentType: 'application/json',
  success: function(response){
    var duce = jQuery.parseJSON(response);
    if(duce.ResponseCode == '200'){
      alert(duce.ResponseMsg);
      window.location.href = currentLocation; 
    }else{
      alert(duce.ResponseMsg);
    }
  }

});
}


jQuery(function ($) {

$("#close-sidebar").click(function() {
  $(".sidebar-wrapper").css('left','-300px');
});
$("#show-sidebar").click(function() {
  $(".sidebar-wrapper").css('left','0px');
});


   
   
});



$('.slider').each(function() {
  var $this = $(this);
  var $group = $this.find('.slide_group');
  var $slides = $this.find('.slide');
  var bulletArray = [];
  var currentIndex = 0;
  var timeout;
  
  function move(newIndex) {
    var animateLeft, slideLeft;
    
    advance();
    
    if ($group.is(':animated') || currentIndex === newIndex) {
      return;
    }
    
    bulletArray[currentIndex].removeClass('active');
    bulletArray[newIndex].addClass('active');
    
    if (newIndex > currentIndex) {
      slideLeft = '100%';
      animateLeft = '-100%';
    } else {
      slideLeft = '-100%';
      animateLeft = '100%';
    }
    
    $slides.eq(newIndex).css({
      display: 'block',
      left: slideLeft
    });
    $group.animate({
      left: animateLeft
    }, function() {
      $slides.eq(currentIndex).css({
        display: 'none'
      });
      $slides.eq(newIndex).css({
        left: 0
      });
      $group.css({
        left: 0
      });
      currentIndex = newIndex;
    });
  }
  
  function advance() {
    clearTimeout(timeout);
    timeout = setTimeout(function() {
      if (currentIndex < ($slides.length - 1)) {
        move(currentIndex + 1);
      } else {
        move(0);
      }
    }, 8000);
  }
  
  $('.next_btn').on('click', function() {
    if (currentIndex < ($slides.length - 1)) {
      move(currentIndex + 1);
    } else {
      move(0);
    }
  });
  
  $('.previous_btn').on('click', function() {
    if (currentIndex !== 0) {
      move(currentIndex - 1);
    } else {
      move(3);
    }
  });
  
  $.each($slides, function(index) {
    var $button = $('<a class="slide_btn">&bull;</a>');
    
    if (index === currentIndex) {
      $button.addClass('active');
    }
    $button.on('click', function() {
      move(index);
    }).appendTo('.slide_buttons');
    bulletArray.push($button);
  });
  
  advance();
});


$(".closesideZContact").click(function () {       
        $('.sideZContact').animate({right: "-310"}, 500, function(){$('.opensideZContact').animate({right: "0"}, 300);});
});
  
$(".opensideZContact").click(function () {        
        $('.opensideZContact').animate({right: "-60"}, 300, function(){$('.sideZContact').animate({right: "0"}, 500);});  
});





;(function($) {

    $.fn.zoomImage = function(paras) {

        var defaultParas = {
            layerW: 100,
            layerH: 100,
            layerOpacity: 0.2,  
            layerBgc: '#000',
            showPanelW: 500,
            showPanelH: 500, 
            marginL: 5, 
            marginT: 0
        };

        paras = $.extend({}, defaultParas, paras);

        $(this).each(function() {
            var self = $(this).css({position: 'relative'});
            var selfOffset = self.offset();
            var imageW = self.width(); 

            var imageH = self.height();

            self.find('img').css({
                width: '100%',
                height: '100%'
            });


            var wTimes = paras.showPanelW / paras.layerW;

            var hTimes = paras.showPanelH / paras.layerH;



            var img = $('<img>').attr('src', self.attr("href")).css({
                position: 'absolute',
                left: '0',
                top: '0',
                width: imageW * wTimes,
                height: imageH * hTimes
            }).attr('id', 'big-img');


            var layer = $('<div>').css({
                display: 'none',
                position: 'absolute',
                left: '0',
                top: '0',
                backgroundColor: paras.layerBgc,
                width: paras.layerW,
                height: paras.layerH,
                opacity: paras.layerOpacity,
                border: '1px solid #ccc',
                cursor: 'crosshair'
            });

            var showPanel = $('<div>').css({
                display: 'none',
                position: 'absolute',
                overflow: 'hidden',
                left: imageW + paras.marginL,
                top: paras.marginT,
                width: paras.showPanelW,
                height: paras.showPanelH,
                'z-index': '99999'
            }).append(img);

            self.append(layer).append(showPanel);

            self.on('mousemove', function(e) {

                var x = e.pageX - selfOffset.left;
                var y = e.pageY - selfOffset.top;

                if(x <= paras.layerW / 2) {
                    x = 0;
                }else if(x >= imageW - paras.layerW / 2) {
                    x = imageW - paras.layerW;
                }else {
                    x = x - paras.layerW / 2;
                }

                if(y < paras.layerH / 2) {
                    y = 0;
                } else if(y >= imageH - paras.layerH / 2) {
                    y = imageH - paras.layerH;
                } else {
                    y = y - paras.layerH / 2;
                }

                layer.css({
                    left: x,
                    top: y
                });

                img.css({
                    left: -x * wTimes,
                    top: -y * hTimes
                });
            }).on('mouseenter', function() {
                layer.show();
                showPanel.show();
            }).on('mouseleave', function() {
                layer.hide();
                showPanel.hide();
            });
        });
    }
})(jQuery);


$('.show').zoomImage();
$('.show-small-img:first-of-type').css({'border': 'solid 1px #951b25', 'padding': '2px'})
$('.show-small-img:first-of-type').attr('alt', 'now').siblings().removeAttr('alt')
$('.show-small-img').click(function () {
  $('#show-img').attr('src', $(this).attr('src'))
  $('#big-img').attr('src', $(this).attr('src')) 
  $(this).attr('alt', 'now').siblings().removeAttr('alt')
  $(this).css({'border': 'solid 1px #951b25', 'padding': '2px'}).siblings().css({'border': 'none', 'padding': '0'})
  if ($('#small-img-roll').children().length > 4) {
    if ($(this).index() >= 3 && $(this).index() < $('#small-img-roll').children().length - 1){
      $('#small-img-roll').css('left', -($(this).index() - 2) * 76 + 'px')
    } else if ($(this).index() == $('#small-img-roll').children().length - 1) {
      $('#small-img-roll').css('left', -($('#small-img-roll').children().length - 4) * 76 + 'px')
    } else {
      $('#small-img-roll').css('left', '0')
    }
  }
});
$('#next-img').click(function (){
  $('#show-img').attr('src', $(".show-small-img[alt='now']").next().attr('src'))
  $('#big-img').attr('src', $(".show-small-img[alt='now']").next().attr('src'))
  $(".show-small-img[alt='now']").next().css({'border': 'solid 1px #951b25', 'padding': '2px'}).siblings().css({'border': 'none', 'padding': '0'})
  $(".show-small-img[alt='now']").next().attr('alt', 'now').siblings().removeAttr('alt')
  if ($('#small-img-roll').children().length > 4) {
    if ($(".show-small-img[alt='now']").index() >= 3 && $(".show-small-img[alt='now']").index() < $('#small-img-roll').children().length - 1){
      $('#small-img-roll').css('left', -($(".show-small-img[alt='now']").index() - 2) * 76 + 'px')
    } else if ($(".show-small-img[alt='now']").index() == $('#small-img-roll').children().length - 1) {
      $('#small-img-roll').css('left', -($('#small-img-roll').children().length - 4) * 76 + 'px')
    } else {
      $('#small-img-roll').css('left', '0')
    }
  }
});

$('#prev-img').click(function (){
  $('#show-img').attr('src', $(".show-small-img[alt='now']").prev().attr('src'))
  $('#big-img').attr('src', $(".show-small-img[alt='now']").prev().attr('src'))
  $(".show-small-img[alt='now']").prev().css({'border': 'solid 1px #951b25', 'padding': '2px'}).siblings().css({'border': 'none', 'padding': '0'})
  $(".show-small-img[alt='now']").prev().attr('alt', 'now').siblings().removeAttr('alt')
  if ($('#small-img-roll').children().length > 4) {
    if ($(".show-small-img[alt='now']").index() >= 3 && $(".show-small-img[alt='now']").index() < $('#small-img-roll').children().length - 1){
      $('#small-img-roll').css('left', -($(".show-small-img[alt='now']").index() - 2) * 76 + 'px')
    } else if ($(".show-small-img[alt='now']").index() == $('#small-img-roll').children().length - 1) {
      $('#small-img-roll').css('left', -($('#small-img-roll').children().length - 4) * 76 + 'px')
    } else {
      $('#small-img-roll').css('left', '0')
    }
  }
});



var instafeedwall = function () {
      var instaFeedStyle1 = new Instafeed({
        target: 'instaFeed-style1',
        limit: 12,
        accessToken: 'IGQVJVSTZAmN2I5NGl6bzJ1WnZA0dFUtX2E4cXkwQVltRDRHWks5czd0MEtDYUpmV2FkM1IzZAHFmMjhBYTR4Mm5wRlVlT1AyZAWl5OXBpelpsM0twVnhtU1l5YUpETFEzd2w2cHZA1NEFpVWdHcmROYUgzSgZDZD',
        template: '<div class="col-md-3"><a href="{{image}}" data-lighter> <div class="item"> <div class="item-img"> <img class="img-1" src="{{image}}" alt=""> <img class="img-2" src="{{image}}" alt=""> </div></div></a></div>'
      });
      instaFeedStyle1.run();
    
  };


  instafeedwall();