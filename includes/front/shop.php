<?php
require_once('acess.php');

/*include_once ('modals.php');*/
?>

<div class='container-fluid' id='search-prods'>

<div class="row">
<div class="col-lg-10 col-lg-offset-1 col-xs-12">
<ul class="nav nav-tabs" id="all-cats"></ul>


<form id='transfer-form' style='margin-bottom: 0px;'>

<input type='hidden' name='types' id='types'>
<div class='row type-1'>
<div class='col-xs-12'>
<h3 style='text-align:center; margin-top: 10px;' class='QUOTES' ></h3>
</div>
<div class="col-lg-4 col-md-6 col-xs-12 form-group">
<span class="glyphicon glyphicon-map-marker"></span> <font class='FROM'></font>
<select required class="form-control" id='all-places' name='from' onchange="showMatch(this.value, $('#types').val())"><option value=''> *</option></select>
</div>
<div class="col-lg-4 col-md-6 col-xs-12 form-group">
<span class="glyphicon glyphicon-screenshot"></span> <font class='TO'></font>
<select required class="form-control" id='match-places' name='to' onchange="showMatch2(this.value, $('#types').val(),$('#all-places').val())"><option value=''>*</option></select>
</div>
<div class="col-lg-4 col-md-6 col-xs-12 form-group">
<span class="glyphicon glyphicon-signal"></span> 
<font class='PASSENGERS'></font>
<select required class="form-control" id='all-classes' name='passagers' onchange="showProdPrice(this.value)"><option value=''>*</option></select>
</div>
<div class="col-lg-4 col-md-6 col-xs-12 form-group">
<span class="glyphicon glyphicon-retweet"></span> <font class='RETURN'></font><br>
<label class="radio-inline">
<input value='No' id='ret-f' type="radio" name="oneway" checked="checked" onchange='showReturn(this.value)'><font class='NO radio-txt'></font>
</label>
<label class="radio-inline">
<input value='Yes' id='ret-t'  type="radio" name="oneway" onchange='showReturn(this.value)'><font class='YES radio-txt'></font>
</label>
</div>
<div class="col-lg-4 col-md-6 col-xs-12 form-group">
<span class="glyphicon glyphicon-compressed"></span> <font class='PROMO_CODE'></font>
<div class="input-group">
<input class="form-control" name='promo' id='promo-code' onkeydown='sizeI(this.value)' placeholder="<?php echo $lang['PROMO_CODE']; ?>"> <span class="input-group-btn"><button onclick='showVerificationPromo($("#promo-code").val())' class="btn btn-default check-code VALIDATE" type="button"></button></span></div>
</div>
<div class="col-lg-4 col-md-6 col-xs-12 form-group promo-label-display">
<span class=" glyphicon glyphicon-gift"></span> <font style="text-transform: uppercase; font-size: 16px;" class='PROMO_CODE'></font><br>
<div class='promo-display'></div>

</div>
</div>

<div class="col-lg-3 col-xs-6 col-lg-push-6">
<h2 class='prod-price' id='prod-price'></h2>
</div>
<div class="col-lg-3 col-xs-6 col-lg-push-6">
<button style='float:right;margin-top: 10px; margin-bottom:10px;' class="book-now btn btn-success BOOK_NOW"></button>
</div>
<div class="row pd-tp-bo">
<div class='col-lg-6 col-xs-12 col-lg-pull-6'>

<div class="col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1" style='padding-top:8px;'><img style='margin:0 auto; max-height:30px;' class='img-responsive' src='front/images/pagamento-loja.png'/></div>


</div>
</div>

</form>
<div id="info-client"></div> 
</div>
</div>

<input type='hidden' class='CHOOSE'>
<input type='hidden' class='TOTAL'>
<input type='hidden' class='NO_CONNECTION'>
<input type='hidden' class='NO_CODE'>
<input type='hidden' class='NO_ORIGIN'>
<input type='hidden' class='NO_DESTINATION'>
<input type='hidden' class='REQUIRED'>
<input type='hidden' class='SESSION_EXPIRED'>
<input type='hidden' class='LANGUAGE'>
<input type='hidden' class='CONFIRM_DETAILS'>
<input type='hidden' class='PURCHASE'>
<input type='hidden' class='CLOSE'>
<input type='hidden' class='YOUR_ORDER'>
<input type='hidden' class='DATA_ERROR'>
<input type='hidden' class='MIN_PAX'>
<input type='hidden' class='TRY_AGAIN'>
<input type='hidden' class='MAX_PAX'>
<input type='hidden' class='ERROR_PAX'>
<input type='hidden' class='PAYMENT_TO_DRIVER'>
<input type='hidden' class='PAYMENT_PAYPAL'>
<input type='hidden' class='PAYMENT_BANK'>
<input type='hidden' class='EMAIL_KO'>
<input type='hidden' class='EMAIL_OK'>
<input type='hidden' class='THANK_YOU'>
<input type='hidden' class='PAYPAL_PAY'>
<input type='hidden' class='REDIRECT'>
<input type='hidden' class='BANK_TRANSFER'>
<input type='hidden' class='PAYPAL'>
<input type='hidden' class='TO_DRIVER'>
<input type='hidden' class='color'>
<input type='hidden' class='nm_code'>
<input type='hidden' class='percentagem'>
<input type='hidden' id='reserved_time'>

<div id='include'></div>

</div>




<script>


var pp = '';
var id_prods = '';
var duracao ='';
url = '<?php echo $allowed; ?>';
url_forms = '<?php echo $allowed_forms; ?>';
tel='';
min = '0';
max = '0';





$(function(){

$('.my-tab').addClass('w3-hover-red w3-text-grey');

loaded = 0;
setTime = 0;


$('#transfer-form').on('submit',function(e){

e.preventDefault();

$('.middle').show();

 setTime = 1;
/*TODOS PAGAMENTOS*/
 $('.pay_type').html("<option value=''>"+$('.CHOOSE').val()+" *</option><option value='Bank'>"+$('.BANK_TRANSFER').text()+"</option><option> value='Paypal'>"+$('.PAYPAL').text()+"</option><option value='Driver'>"+$('.TO_DRIVER').text()+"</option>");

/*SEM PAYPAL*/
 $('.pay_type').html("<option value=''>"+$('.CHOOSE').val()+" *</option><option value='Bank'>"+$('.BANK_TRANSFER').text()+"</option><option value='Driver'>"+$('.TO_DRIVER').text()+"</option>");

 $('html, body').animate({ scrollTop: $('.pd-tp-bo').offset().top }, 'slow');

 f=0;
 t=0;

if($('#all-places').val().match(/Airpo/g) || $('#all-places').val().match(/Aerop/g) || $('#all-places').val().match(/airpo/g) || $('#all-places').val().match(/aerop/g)) f=1;

if($('#match-places').val().match(/Airpo/g) || $('#match-places').val().match(/Aerop/g) || $('#match-places').val().match(/airpo/g) || $('#match-places').val().match(/aerop/g))t=1;

/*APRESENTA FORM AEROPORTO CHEGADA*/
if($("input[type=radio]:checked").val() == 'No' && f == '1'){
$.ajax({url: "front/f2.php",error:function(){
 $('.middle').hide();
 $('#info-user-ko').html('Erro ao obter form chegada, p.f. verifique a ligação Wi-Fi.');
 $("#pop-modal_ko").trigger('click');
}
})
  .done(function( html ) {$( "#include" ).html(html); $('.middle').hide();});
}


/*APRESENTA FORM AEROPORTO PARTIDA*/
else if($("input[type=radio]:checked").val() == 'No' && t == '1'){
 $('.middle').hide();
 $.ajax({url: "front/f3.php",error:function(){
 $('.middle').hide();
 $('#info-user-ko').html('Erro ao obter form chegada, p.f. verifique a ligação Wi-Fi.');
 $("#pop-modal_ko").trigger('click');
}
})
  .done(function( html ) {$( "#include" ).html(html); $('.middle').hide();});
}


/*APRESENTA FORM AEROPORTO CHEGADA/PARTIDA IDA E VOLTA*/
else if($("input[type=radio]:checked").val() == 'Yes' && f == '1' || $("input[type=radio]:checked").val() == 'Yes' && t == '1' ){
$.ajax({url: "front/f1.php",error:function(){
 $('.middle').hide();
$('#info-user-ko').html('Erro ao obter form ida e volta aeroporto, p.f. verifique a ligação Wi-Fi.');
$("#pop-modal_ko").trigger('click');
}
})
      .done(function( html ) {$( "#include" ).html(html); $('.middle').hide();});
}

/*APRESENTA FORM TRANSFER UMA VIAGEM*/
else if($("input[type=radio]:checked").val() == 'No' && t == '0' || $("input[type=radio]:checked").val() == 'No' && f == '0'){
 $('.middle').hide();
 j.ajax({url: "front/f4.php",error:function(){
 $('.middle').hide();
 $('#info-user-ko').html('Erro ao obter form chegada, p.f. verifique a ligação Wi-Fi.');
 $("#pop-modal_ko").trigger('click');
}
})
  .done(function( html ) {$( "#include" ).html(html); $('.middle').hide();});
}

/*APRESENTA FORM TRANSFER IDA E VOLTA*/
 else if($("input[type=radio]:checked").val() == 'Yes' && f == '0' || $("input[type=radio]:checked").val() == 'Yes' && t == '0' ){
  $('.middle').hide();
  j.ajax({url: "front/f5.php",error:function(){
   $('.middle').hide();
   $('#info-user-ko').html('Erro ao obter form chegada, p.f. verifique a ligação Wi-Fi.');
   $("#pop-modal_ko").trigger('click');
}
})
  .done(function( html ) {$( "#include" ).html(html); $('.middle').hide();});
}
});
 $("#all-places, #match-places, #all-classes").select2();
});


/* ACESSO AS LINGUAGENS*/
function languages(vl){
 $('.middle').show();
 j.ajax({
  type: "POST",
  url: "../front/languages/lang."+vl+".php",
  dataType:"json",
   success: function(data) {
    $('.middle').hide();
    $('.MENU_HOME').text(data.MENU_HOME);
    $('.LANGUAGE').val(data.LANGUAGE);
    $('.CHOOSE').val(data.CHOOSE);
    $('#all-places, #match-places, #all-classes').prop('data-placeholder',data.CHOOSE);
    $('.NO').text(data.NO).val(data.NO);
    $('.YES').text(data.YES).val(data.YES);
    $('.TO').text(data.TO).val(data.TO);
    $('.FROM').text(data.FROM).val(data.FROM)
    $('.PASSENGERS').text(data.PASSENGERS).val(data.PASSENGERS);
    $('.RETURN').text(data.RETURN).val(data.RETURN);
    $('.PROMO_CODE').text(data.PROMO_CODE);
    $('#promo-code').prop('placeholder',data.PROMO_CODE);
    $('.VALIDATE').html("<span class='glyphicon glyphicon-check'></span> "+data.VALIDATE);
    $('.BOOK_NOW').html("<span class='glyphicon glyphicon-shopping-cart'></span> "+data.BOOK_NOW);
    $('.PAYMENTS').text(data.PAYMENTS);
    $('.CLOSE').text(data.CLOSE).val(data.CLOSE);
    $('.WARNING').html("<span class='glyphicon glyphicon-warning-sign'></span> "+data.WARNING);
    $('.SUCCESS').html("<span class='glyphicon glyphicon-ok'></span> "+data.SUCCESS);
    $('.TERMS_CONDITIONS').html("<span class='glyphicon glyphicon-cog'></span> "+data.TERMS_CONDITIONS);
    $('.NO_CONNECTION').html(data.NO_CONNECTION);
    $('.NO_CODE').html(data.NO_CODE);
    $('.NO_ORIGIN').html(data.NO_ORIGIN);
    $('.NO_DESTINATION').html(data.NO_DESTINATION);
    $('.REQUIRED').html(data.REQUIRED);
    $('.TOTAL').text(data.TOTAL);
    $('.ARRIVAL_DETAILS').html("<span class='glyphicon glyphicon-map-marker'></span> "+data.ARRIVAL_DETAILS);
    $('.DEPARTURE_DETAILS').html("<span class='glyphicon glyphicon-screenshot'></span> "+ data.DEPARTURE_DETAILS);
    $('.NR_PAX').html("<span class='glyphicon glyphicon-signal'></span> "+data.NR_PAX);
    $('.OBS').html("<span class='glyphicon glyphicon-paperclip'></span> "+data.OBS);
    $('.PAYMENTS_MET').html("<span class='glyphicon glyphicon-eur'></span> "+data.PAYMENTS_MET);
    $('.CONFIRM').html("<span class='glyphicon glyphicon-thumbs-up'></span> "+data.CONFIRM);
    $('.RETURN_DETAILS').text(data.RETURN_DETAILS);
    $('.PICKUP_DETAILS').text(data.PICK_UP_DETAILS);
    $('.BANK_TRANSFER').text(data.BANK_TRANSFER);
    $('.PAYPAL').text(data.PAYPAL);
    $('.TO_DRIVER').text(data.TO_DRIVER);
    $('.QUOTES').text(data.QUOTES);
    $('.ARRIVAL_FLIGHT_N').text(data.ARRIVAL_FLIGHT_N).next().prop('placeholder',data.ARRIVAL_FLIGHT_N);
    $('.ARRIVAL_FLIGHT_DT').text(data.ARRIVAL_FLIGHT_DT);
    $('.ARRIVAL_FLIGHT_TM').text(data.ARRIVAL_FLIGHT_TM);
    $('.ARRIVAL_FLIGHT_ADDR').text(data.ARRIVAL_FLIGHT_ADDR).next().prop('placeholder',data.ARRIVAL_FLIGHT_ADDR);
    $('.DEPARTURE_FLIGHT_N').text(data.DEPARTURE_FLIGHT_N).next().prop('placeholder',data.DEPARTURE_FLIGHT_N);
    $('.DEPARTURE_FLIGHT_DT').text(data.DEPARTURE_FLIGHT_DT);
    $('.DEPARTURE_FLIGHT_DT_LABEL').prop('placeholder',data.DEPARTURE_FLIGHT_DT);
    $('.DEPARTURE_FLIGHT_TM').text(data.DEPARTURE_FLIGHT_TM);
    $('.DEPARTURE_FLIGHT_TM_LABEL').prop('placeholder',data.DEPARTURE_FLIGHT_TM);
    $('.DEPARTURE_FLIGHT_PICK').text(data.DEPARTURE_FLIGHT_PICK);
    $('.DEPARTURE_FLIGHT_TR_TIME').text(data.DEPARTURE_FLIGHT_TR_TIME)
    $('.DEPARTURE_FLIGHT_TR_TIME_LABEL').prop('placeholder',data.DEPARTURE_FLIGHT_TR_TIME);
    $('.DEPARTURE_FLIGHT_ADDR').text(data.DEPARTURE_FLIGHT_ADDR).next().prop('placeholder',data.DEPARTURE_FLIGHT_ADDR);
    $('.PERSONAL_DETAILS').html("<span class='glyphicon glyphicon-user'></span> "+data.PERSONAL_DETAILS);
    $('.PERSONAL_DETAILS_NAME').text(data.PERSONAL_DETAILS_NAME).next().prop('placeholder',data.PERSONAL_DETAILS_NAME);
    $('.PERSONAL_DETAILS_EMAIL').text(data.PERSONAL_DETAILS_EMAIL).next().prop('placeholder',data.PERSONAL_DETAILS_EMAIL);
    $('.PERSONAL_DETAILS_TEL').text(data.PERSONAL_DETAILS_TEL).next().prop('placeholder',data.PERSONAL_DETAILS_TEL);
    $('.PERSONAL_DETAILS_COUNTRY').text(data.PERSONAL_DETAILS_COUNTRY).next().prop('placeholder',data.PERSONAL_DETAILS_COUNTRY);
    $('.ADULT').text(data.ADULT).next().prop('placeholder',data.ADULT);
    $('.CHILDREN').text(data.CHILDREN).next().prop('placeholder',data.CHILDREN);
    $('.BABY').text(data.BABY).next().prop('placeholder',data.BABY);
    $('.OBS_TXT').text(data.OBS_TXT).next().prop('placeholder',data.OBS_TXT);
    $('.SESSION_EXPIRED').html(data.SESSION_EXPIRED);
    $('.SEE_MORE').html("<span class='glyphicon glyphicon-eye-open'></span> "+data.SEE_MORE);
    $('.ACCEPT_TERMS').text(data.ACCEPT_TERMS);
    $('.TERMS_CONDITIONS_LABEL').text(data.TERMS_CONDITIONS);
    $('.PAYMENTS_MET_LABEL').text(data.PAYMENTS_MET);
    $('.CONFIRM_DETAILS').val(data.CONFIRM_DETAILS);
    $('.PURCHASE').val(data.PURCHASE);
    $('.YOUR_ORDER').val(data.YOUR_ORDER).text(data.YOUR_ORDER);
    $('.TRANSFER_PICK_DETAILS').html("<span class='glyphicon glyphicon-map-marker'></span> "+data.TRANSFER_PICK_DETAILS);
    $('.TRANSFER_PICK_DT').text(data.TRANSFER_PICK_DT);
    $('.TRANSFER_PICK_DT_LABEL').prop('placeholder',data.TRANSFER_PICK_DT);
    $('.TRANSFER_PICK_TM').text(data.TRANSFER_PICK_TM);
    $('.TRANSFER_PICK_TM_LABEL').prop('placeholder',data.TRANSFER_PICK_TM);
    $('.TRANSFER_PICK_ADDR').text(data.TRANSFER_PICK_ADDR).next().prop('placeholder',data.TRANSFER_PICK_ADDR);
    $('.TRANSFER_DEL_DETAILS').html("<span class='glyphicon glyphicon-screenshot'></span> "+ data.TRANSFER_DEL_DETAILS);
    $('.TRANSFER_DEL_DT').text(data.TRANSFER_DEL_DT);
    $('.TRANSFER_DEL_DT_LABEL').prop('placeholder',data.TRANSFER_DEL_DT);
    $('.TRANSFER_DEL_TM').text(data.TRANSFER_DEL_TM);
    $('.TRANSFER_DEL_TM_LABEL').prop('placeholder',data.TRANSFER_DEL_TM);
    $('.TRANSFER_DEL_ADDR').text(data.TRANSFER_DEL_ADDR).next().prop('placeholder',data.TRANSFER_DEL_ADDR);
    $('.GET').text(data.GET);
    $('.CODE_TXT').text(data.CODE_TXT);
    $('.DEBIT').text(data.DEBIT).prop('title',data.DEBIT);
    $('.DATA_ERROR').text(data.DATA_ERROR);
    $('.MIN_PAX').text(data.MIN_PAX);
    $('.TRY_AGAIN').text(data.TRY_AGAIN);
    $('.MAX_PAX').text(data.MAX_PAX);
    $('.ERROR_PAX').text(data.ERROR_PAX);
    $('.PAYMENT_TO_DRIVER').text(data.PAYMENT_TO_DRIVER);
    $('.PAYMENT_PAYPAL').text(data.PAYMENT_PAYPAL);
    $('.PAYMENT_BANK').text(data.PAYMENT_BANK);
    $('.EMAIL_KO').text(data.EMAIL_KO);
    $('.EMAIL_OK').text(data.EMAIL_OK);
    $('.THANK_YOU').text(data.THANK_YOU);
    $('.PAYPAL_PAY').text(data.PAYPAL_PAY);
    $('.REDIRECT').text(data.REDIRECT);
 
    $('.flags').addClass('f-active');
    $('.active-'+vl).removeClass('f-active');
   $('.pay_type').html("<option value=''>"+$('.CHOOSE').val()+" *</option><option value='Bank'>"+$('.BANK_TRANSFER').text()+"</option><option value='Driver'>"+$('.TO_DRIVER').text()+"</option>");
   
   /* CARREGAR CATEGORIAS */
   loaded == '0' ? getCategorias(): false;
  },
  error:function(data){
     $('.middle').hide();
    $("#pop-modal-ko" ).trigger( "click" );
    $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
});
}

function myTermsConditions(){
$("#pop-modal-terms" ).trigger( "click" );
}

function calculateRecomendTime(){
  stamp = $("#dep_fl_tm").find("input").val().split(":");
  end_stamp = (stamp[0]*60*60)+(stamp[1]*60);
  dur = parseInt(duracao)+parseInt(7200);
  pc_dt= $("#dep_fl_dt").find("input").val().split("/");
  p1= pc_dt[1]+'/'+pc_dt[0]+'/'+pc_dt[2];
  x = parseInt(Math.round(new Date(p1))/1000)+parseInt(stamp[0]*60*60)+(stamp[1]*60)-parseInt(dur);
  var d = new Date(x*1000);
  todate=new Date(d).getDate();
  tomonth = new Date(d).getMonth()+1;
  toyear = new Date(d).getFullYear();
  tohours = new Date(d).getHours();
  tominutes = new Date(d).getMinutes();
  tominutes <= 9 ? tominutes = '0'+tominutes: tominutes=tominutes;
  tohours <= 9 ? tohours = '0'+tohours: tohours=tohours;
  todate <= 9 ? todate = '0'+todate: todate=todate;
  tomonth <= 9 ? tomonth = '0'+tomonth: tomonth=tomonth;
  recomend_pick_up = todate+'/'+tomonth+'/'+toyear+' '+tohours+':'+tominutes;
  $('#dep_fl_pick, #not-recomended').val(recomend_pick_up);
}


/*TAMANHO DO INPUT DO COD PROMO PASSAR PARA VERDE*/
function sizeI(vl){
vl.length+1 >= 1 ? $('.check-code').addClass('btn-success') : $('.check-code').removeClass('btn-success');}
var id_prods='';

/*OBTER TODAS AS CATEGORIAS VISIVEIS*/
function getCategorias(){
    $('.middle').show();
    $('#all-places, #match-places, #all-classes').prop("disabled", true);  
    $('#promo-code').val('').prop('readonly', true);
    cats='';
    dataValue="&action=1";
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    loaded = 1;
    arr=[];
    $('.middle').hide();
    arr =  JSON.parse(data);
 if (arr == null || arr.length < 1){}
    else {
     for(i=0;i<arr.length;i++){
      if (i==0) 
       cats += "<li class='active'><a class='w3-red w3-hover-grey w3-text-white' data-toggle='tab' onclick='showProds("+arr[i].tipo+")'><i class='fa fa-plane w3-margin-right'></i>"+arr[i].nome+"</a></li>";
      else
       cats += "<li><a class='w3-red w3-hover-grey w3-text-white' data-toggle='tab' onclick='showProds("+arr[i].tipo+")'><span class='glyphicon glyphicon-tags'></span>&nbsp; "+arr[i].nome+"</a></li>";
     }
    $('.loader-container').hide();
    $("#all-cats").empty().html(cats);
    showProds(arr[0].tipo);
    $('#types').val(arr[0].tipo);
    $('#search-prods').fadeIn();
   }
   /*COR DO CLIENTE*/
   $('.panel-body,  .type-1 ,.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover').css('background',$('.color').val());
   },
   error:function(data){
   $('.middle').hide();
   $("#pop-modal-ko" ).trigger( "click" );
   $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}

/*OBTER TODOS OS LOCAIS DOS PRODUTOS PARA CAMPO ORIGEM*/

function showProds(tipo){
  $('.middle #content-order').show();
  dataValue="&action=2&tipo="+tipo;
   places='';
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    $('.middle').hide();
    arr=[];
    arr =  JSON.parse(data);
    if (arr == null || arr.length < 1){}
    else {
     for(i=0;i<arr.length;i++){
      !arr[i].f ? false : arr[i].f;
      places += "<option value='"+arr[i].f+"'>"+arr[i].f+"</option>"
     }
     $("#all-places").html("<option value=''>"+$('.CHOOSE').val()+" *</option>"+places);
     $('#match-place, #all-classes').val('');
     $('#info-client, #prod-price, #include').empty();
     $('#all-places').prop("disabled", false);
     $('.check-code').removeClass('btn-success');
     $('#all-classes, #match-places').html("<option value=''>"+$('.CHOOSE').val()+" *</option>");
     }
   },
   error:function(data){
    $('.middle').hide();
    $("#pop-modal-ko" ).trigger( "click" );
    $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}

function showMatch(origem,tipo){
  if (!origem){
   /*CAMPOS DE PESQUISA A NULL */
   $('#match-places, #all-classes, #promo-code').val('');
   $('#prod-price, #info-client, #include').empty();
   $('.check-code').removeClass('btn-success');
   $("#ret-t").removeAttr('checked');
   $("#ret-f").prop('checked',true);
   $('#match-places, #all-classes').prop("disabled", true);
   $('#promo-code').prop('readonly', true);
}


else{
   $('.middle').show();
  dataValue="&action=3&origem="+origem+"&tipo="+tipo;
  response ='';
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     $('.middle').hide();
    arr=[];
    arr =  JSON.parse(data);
    if (arr == null || arr.length < 1){}
    else {
     for(i=0;i<arr.length;i++){ 
       arr[i].local == origem ? false : to = arr[i].local;
       arr[i].local_fim == origem ? false : to= arr[i].local_fim;
      response += ("<option value='"+to+"'>"+to+"</option>");
      }
     $("#match-places").html("<option value=''>"+$('.CHOOSE').val()+" *</option>"+response);
     $('#all-classes').val('');
     $('#info-client, #prod-price, #include').empty();
     $('#show-prod-price, .img-best_price').hide();
     $("#ret-t").removeAttr('checked');
     $("#ret-f").prop('checked',true);
     $('#match-places').prop("disabled", false);
     $('.check-code').removeClass('btn-success');
     $('#promo-code').val('').prop('readonly', true);
    }
   },
   error:function(data){
    $('.middle').hide();
    $("#pop-modal-ko" ).trigger( "click" );
    $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}
}

function showMatch2(destino,tipo,origem){
  if (!destino){
   /*CAMPOS DE PESQUISA A NULL */
   $('#all-classes, #promo-code').val('');
   $('#prod-price, #info-client, #include').empty();
   $('.check-code').removeClass('btn-success');
   $("#ret-t").removeAttr('checked');
   $("#ret-f").prop('checked',true);
   $('#match-places, #all-classes').prop("disabled", true);
   $('#promo-code').prop('readonly', true);
}
else{
 $('.middle').show();
dataValue="&action=4&origem="+origem+"&tipo="+tipo+"&destino="+destino;
response ='';
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     $('.middle').hide();
    arr=[];
    arr =  JSON.parse(data);
    id_prods = arr[0].id;
    duracao=arr[0].duracao;
    showClasses();
   },
   error:function(data){
    $('.middle').hide();
    $("#pop-modal-ko" ).trigger( "click" );
   $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}
}

function showClasses(){
  $('.middle').show();
 dataValue="&action=5&tipo="+$('#types').val()+"&id_prod="+id_prods;
 response ='';
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
   $('.middle').hide();
    arr=[];    
    arr =  JSON.parse(data);
     for(i=0;i<arr.length;i++){ 
      response += ("<option data-min='"+arr[i].min+"' data-max='"+arr[i].max+"' value='"+arr[i].id+"'>"+arr[i].nome+"</option>");
      }
      $("#all-classes").html("<option value=''>"+$('.CHOOSE').val()+" *</option>"+response).prop("disabled", false);
      $('#promo-code').val('').prop('readonly', true);
      $('#prod-price, #info-client, #include').empty();
      $('.check-code').removeClass('btn-success');
      $("#ret-t").removeAttr('checked');
      $("#ret-f").prop('checked',true);
   },
   error:function(data){
   $('.middle').hide();
   $("#pop-modal-ko" ).trigger( "click" );
   $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}

function showProdPrice(vl){

min = $('#all-classes option:selected').data('min');
max = $('#all-classes option:selected').data('max');

response ='';
if( !$('#all-places').val() || !$('#match-places').val() || !$('#all-classes').val()){
 $('#match-place, #all-classes').val(''); 
 $('#info-client, #prod_price, #include').empty(); 
 $('#show-prod-price, .img-best_price').hide();
 $('.check-code').removeClass('btn-success');
 return;
}

else{
     $('.middle').show();
    dataValue="&action=6&tipo="+$('#types').val()+"&id_label="+vl+"&id_prod="+id_prods;
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    $('.middle').hide();
    arr=[];
    arr =  JSON.parse(data);
    var from = $("#all-places option:selected").text();
    var to = $("#match-places option:selected").text();
    var pax = $("#all-classes option:selected").text();
    $('#prod-price').html("<font>"+parseFloat(arr[0].valor).toFixed(2)+"€</font><img class='low-price hidden-xs' src='front/images/bestprice.png';/>");
    $('#show-prod-price').fadeIn();
    $('#promo-code').prop('readonly', false);
    $('.check-code').removeClass('btn-success');
    $("#ret-t").removeAttr('checked');
    $("#ret-f").prop('checked',true);
    pp = arr[0].valor;
    $("input[type=radio]:checked").val() == 'No' ? oneway = "<font>"+$('.NO').val()+"</font>" : oneway = "<font>"+$('.YES').val()+"</font>" ;

    $('#info-client').html("<label>"+$('.FROM').text()+"</label> "+from+" <label> "+$('.TO').text()+" </label> "+to+" <label> "+$('.PASSENGERS').text()+" </label> "+pax+" <label>"+$('.RETURN').text()+"</label> "+oneway+" <label>"+$('.TOTAL').text()+" </label> "+parseFloat(arr[0].valor).toFixed(2)+"€");

   $('html, body').animate({ scrollTop: $('#search-prods').offset().top }, 'slow');

   },
   error:function(data){
    $('.middle').hide();
    $("#pop-modal-ko" ).trigger( "click" );
    $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}
}

function showReturn(vl){
response ='';
if( !$('#all-places').val() || !$('#match-places').val() || !$('#all-classes').val()){
   $("#pop-modal-ko" ).trigger( "click" );
   $('#info-user-ko').html($('.REQUIRED').text());
   $('#prod-price, #info-client, #include').empty();
   $('.check-code').removeClass('btn-success');
   $("#ret-t").removeAttr('checked');
   $("#ret-f").prop('checked',true);
 return;
}
else{
     $('.middle').show();
dataValue="&action=7&tipo="+$('#types').val()+"&id_label="+$('#all-classes').val()+"&id_prod="+id_prods+"&return="+vl;
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     $('.middle').hide();
    arr=[];
    arr =  JSON.parse(data);
     $('#info-client').html("<h2>"+parseFloat(arr[0].valor).toFixed(2)+"€</h2>");
    var from = $("#all-places option:selected").text();
    var to = $("#match-places option:selected").text();
    var pax = $("#all-classes option:selected").text();
    $('#include').empty();
    $('#prod-price').html("<font>"+parseFloat(arr[0].valor).toFixed(2)+"€</font><img class='low-price hidden-xs' src='front/images/bestprice.png';/>");
    $('#show-prod-price').fadeIn();
    pp = arr[0].valor;
    $("input[type=radio]:checked").val() == 'No' ? oneway = "<font>"+$('.NO').text()+"</font>" : oneway = "<font>"+$('.YES').text()+"</font>" ;
    $('#info-client').html("<label>"+$('.FROM').text()+"</label> "+from+" <label> "+$('.TO').text()+" </label> "+to+" <label> "+$('.PASSENGERS').text()+" </label> "+pax+" <label>"+$('.RETURN').text()+"</label> "+oneway+" <label>"+$('.TOTAL').text()+" </label> "+parseFloat(arr[0].valor).toFixed(2)+"€");
  
  $('.check-code').removeClass('btn-success');

  $('html, body').animate({ scrollTop: $('#search-prods').offset().top }, 'slow');
   },
   error:function(data){
   $('.middle').hide();
   $("#pop-modal-ko" ).trigger( "click" );
   $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}
}

function showVerificationPromo(vl){
response ='';
var oneway = $("input[type=radio]:checked").val();
if( !$('#all-places').val() || !$('#match-places').val() || !$('#all-classes').val()){
   $('#match-place, #all-classes').val(''); 
   $('#info-client').empty();
   $('#show-prod-price, .img-best_price').hide();
 return;
}

else{
   $('.middle').show();
dataValue="&action=8&tipo="+$('#types').val()+"&id_label="+$('#all-classes').val()+"&id_prod="+id_prods+"&return="+oneway+"&promo="+vl;
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     $('.middle').hide();
    arr=[];
    arr =  JSON.parse(data);
    $('#info-client').html("<h2>"+parseFloat(arr[0].valor).toFixed(2)+"€");
    var from = $("#all-places option:selected").text();
    var to = $("#match-places option:selected").text();
    var pax = $("#all-classes option:selected").text()
    $('#show-prod-price').fadeIn();
    $("input[type=radio]:checked").val() == 'No' ? oneway = "<font class='NO'>"+$('.NO').text()+"</font>" : oneway = "<font class='YES'>"+$('.YES').text()+"</font>" ;
    
 /* SE CODIGO INVALIDO NA RESPOSTA*/

    if (arr[0].promo == 0 ){

    $('#info-client').html("<label class='FROM'>"+$('.FROM').text()+"</label> "+from+" <label class='TO'> "+$('.TO').text()+" </label> "+to+" <label class='PASSENGERS'> "+$('.PASSENGERS').text()+" </label> "+pax+" <label class='RETURN'>"+$('.RETURN').text()+"</label> "+oneway+" <label class='TOTAL'>"+$('.TOTAL').text()+" </label> "+parseFloat(arr[0].valor).toFixed(2)+"€");
  pp = arr[0].valor;
 $('#prod-price').html("<font>"+parseFloat(arr[0].valor).toFixed(2)+"€</font><img class='low-price hidden-xs' src='front/images/bestprice.png';/>");
    $("#pop-modal-ko").trigger( "click" );
    $('#info-user-ko').html($('.NO_CODE').text());
   }

/* SE CODIGO VALIDO NA RESPOSTA*/
 
   else if (arr[0].promo == 1 ){
    pp = arr[0].desconto;
    $('#info-client').html("<label class='FROM'>"+$('.FROM').text()+"</label> "+from+" <label class='TO'> "+$('.TO').text()+" </label> "+to+" <label class='PASSENGERS'> "+$('.PASSENGERS').text()+" </label> "+pax+" <label class='RETURN'>"+$('.RETURN').text()+"</label> "+oneway+" <label class='TOTAL'>"+$('.TOTAL').text()+"</label> "+parseFloat(arr[0].desconto).toFixed(2)+"€");
    $('#prod-price').html("<font style='font-size:15px; color:#d9534f; text-decoration: line-through;'>"+parseFloat(arr[0].valor).toFixed(2)+"€</font>&nbsp;<font style='color:#333;'>"+parseFloat(arr[0].desconto).toFixed(2)+"€</font><img class='low-price hidden-xs' src='front/images/bestprice.png';/>");
}
},
   error:function(data){
    $('.middle').hide();
    $("#pop-modal-ko" ).trigger( "click" );
    $('#info-user-ko').html($('.NO_CONNECTION').text());
   }
 });
}
}

function callDefinitions(){
 dataValue='action=99';
 $.ajax({ url:url+'requests.php',
   data:dataValue,
   type:'POST', 
   success:function(data){
     arr=[];
     arr =  JSON.parse(data);
     if (arr == null || arr.length < 1){}
     else {
          $('#reserved_time').val(arr[0].hora_reserva);
          tel = arr[0].tel;
          arr[0].termos ? $('#info-user-terms').html(arr[0].termos) : $('#info-user-terms').html('Terms & Conditions');
          arr[0].promo_name;
          arr[0].promo_value;
          arr[0].color ? $('.color').val(arr[0].color) : $('.color').val('#EEE');
          arr[1].nm_code ? $('.nm_code').val(arr[1].nm_code) : $('.nm_code').val('');
          arr[1].percentagem ?  $('.percentagem').val(arr[1].percentagem) : $('.percentagem').val('');
          if( arr[1].nm_code && arr[1].percentagem){
          $('.promo-display').html("<font class='GET'></font><strong> "+$('.percentagem').val()+"% </strong><font class='CODE_TXT'></font><strong> "+$('.nm_code').val()+" </strong>");
          $('.promo-label-display').show();
          }
     }
     /*CARREGAR TAGS DA LINGUAGEM*/
     languages('en-gb');
    },
    error:function(data){}
  });
}

</script>

