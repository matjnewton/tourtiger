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
<select required class="form-control" id='all-places' name='from' onchange="showMatch(this.value, j('#types').val())"><option value=''> *</option></select>
</div>
<div class="col-lg-4 col-md-6 col-xs-12 form-group">
<span class="glyphicon glyphicon-screenshot"></span> <font class='TO'></font>
<select required class="form-control" id='match-places' name='to' onchange="showMatch2(this.value, j('#types').val(),j('#all-places').val())"><option value=''>*</option></select>
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
<input class="form-control" name='promo' id='promo-code' onkeydown='sizeI(this.value)' placeholder="<?php echo $lang['PROMO_CODE']; ?>"> <span class="input-group-btn"><button onclick='showVerificationPromo(j("#promo-code").val())' class="btn btn-default check-code VALIDATE" type="button"></button></span></div>
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





j(function(){

j('.my-tab').addClass('w3-hover-red w3-text-grey');

loaded = 0;
setTime = 0;


j('#transfer-form').on('submit',function(e){

e.preventDefault();

j('.middle').show();

 setTime = 1;
/*TODOS PAGAMENTOS*/
 j('.pay_type').html("<option value=''>"+j('.CHOOSE').val()+" *</option><option value='Bank'>"+j('.BANK_TRANSFER').text()+"</option><option> value='Paypal'>"+j('.PAYPAL').text()+"</option><option value='Driver'>"+j('.TO_DRIVER').text()+"</option>");

/*SEM PAYPAL*/
 j('.pay_type').html("<option value=''>"+j('.CHOOSE').val()+" *</option><option value='Bank'>"+j('.BANK_TRANSFER').text()+"</option><option value='Driver'>"+j('.TO_DRIVER').text()+"</option>");

 j('html, body').animate({ scrollTop: j('.pd-tp-bo').offset().top }, 'slow');

 f=0;
 t=0;

if(j('#all-places').val().match(/Airpo/g) || j('#all-places').val().match(/Aerop/g) || j('#all-places').val().match(/airpo/g) || j('#all-places').val().match(/aerop/g)) f=1;

if(j('#match-places').val().match(/Airpo/g) || j('#match-places').val().match(/Aerop/g) || j('#match-places').val().match(/airpo/g) || j('#match-places').val().match(/aerop/g))t=1;

/*APRESENTA FORM AEROPORTO CHEGADA*/
if(j("input[type=radio]:checked").val() == 'No' && f == '1'){
j.ajax({url: "front/f2.php",error:function(){
 j('.middle').hide();
 j('#info-user-ko').html('Erro ao obter form chegada, p.f. verifique a ligação Wi-Fi.');
 j("#pop-modal_ko").trigger('click');
}
})
  .done(function( html ) {j( "#include" ).html(html); j('.middle').hide();});
}


/*APRESENTA FORM AEROPORTO PARTIDA*/
else if(j("input[type=radio]:checked").val() == 'No' && t == '1'){
 j('.middle').hide();
 j.ajax({url: "front/f3.php",error:function(){
 j('.middle').hide();
 j('#info-user-ko').html('Erro ao obter form chegada, p.f. verifique a ligação Wi-Fi.');
 j("#pop-modal_ko").trigger('click');
}
})
  .done(function( html ) {j( "#include" ).html(html); j('.middle').hide();});
}


/*APRESENTA FORM AEROPORTO CHEGADA/PARTIDA IDA E VOLTA*/
else if(j("input[type=radio]:checked").val() == 'Yes' && f == '1' || j("input[type=radio]:checked").val() == 'Yes' && t == '1' ){
j.ajax({url: "front/f1.php",error:function(){
 j('.middle').hide();
j('#info-user-ko').html('Erro ao obter form ida e volta aeroporto, p.f. verifique a ligação Wi-Fi.');
j("#pop-modal_ko").trigger('click');
}
})
      .done(function( html ) {j( "#include" ).html(html); j('.middle').hide();});
}

/*APRESENTA FORM TRANSFER UMA VIAGEM*/
else if(j("input[type=radio]:checked").val() == 'No' && t == '0' || j("input[type=radio]:checked").val() == 'No' && f == '0'){
 j('.middle').hide();
 j.ajax({url: "front/f4.php",error:function(){
 j('.middle').hide();
 j('#info-user-ko').html('Erro ao obter form chegada, p.f. verifique a ligação Wi-Fi.');
 j("#pop-modal_ko").trigger('click');
}
})
  .done(function( html ) {j( "#include" ).html(html); j('.middle').hide();});
}

/*APRESENTA FORM TRANSFER IDA E VOLTA*/
 else if(j("input[type=radio]:checked").val() == 'Yes' && f == '0' || j("input[type=radio]:checked").val() == 'Yes' && t == '0' ){
  j('.middle').hide();
  j.ajax({url: "front/f5.php",error:function(){
   j('.middle').hide();
   j('#info-user-ko').html('Erro ao obter form chegada, p.f. verifique a ligação Wi-Fi.');
   j("#pop-modal_ko").trigger('click');
}
})
  .done(function( html ) {j( "#include" ).html(html); j('.middle').hide();});
}
});
 j("#all-places, #match-places, #all-classes").select2();
});


/* ACESSO AS LINGUAGENS*/
function languages(vl){
 j('.middle').show();
 j.ajax({
  type: "POST",
  url: "../front/languages/lang."+vl+".php",
  dataType:"json",
   success: function(data) {
    j('.middle').hide();
    j('.MENU_HOME').text(data.MENU_HOME);
    j('.LANGUAGE').val(data.LANGUAGE);
    j('.CHOOSE').val(data.CHOOSE);
    j('#all-places, #match-places, #all-classes').prop('data-placeholder',data.CHOOSE);
    j('.NO').text(data.NO).val(data.NO);
    j('.YES').text(data.YES).val(data.YES);
    j('.TO').text(data.TO).val(data.TO);
    j('.FROM').text(data.FROM).val(data.FROM)
    j('.PASSENGERS').text(data.PASSENGERS).val(data.PASSENGERS);
    j('.RETURN').text(data.RETURN).val(data.RETURN);
    j('.PROMO_CODE').text(data.PROMO_CODE);
    j('#promo-code').prop('placeholder',data.PROMO_CODE);
    j('.VALIDATE').html("<span class='glyphicon glyphicon-check'></span> "+data.VALIDATE);
    j('.BOOK_NOW').html("<span class='glyphicon glyphicon-shopping-cart'></span> "+data.BOOK_NOW);
    j('.PAYMENTS').text(data.PAYMENTS);
    j('.CLOSE').text(data.CLOSE).val(data.CLOSE);
    j('.WARNING').html("<span class='glyphicon glyphicon-warning-sign'></span> "+data.WARNING);
    j('.SUCCESS').html("<span class='glyphicon glyphicon-ok'></span> "+data.SUCCESS);
    j('.TERMS_CONDITIONS').html("<span class='glyphicon glyphicon-cog'></span> "+data.TERMS_CONDITIONS);
    j('.NO_CONNECTION').html(data.NO_CONNECTION);
    j('.NO_CODE').html(data.NO_CODE);
    j('.NO_ORIGIN').html(data.NO_ORIGIN);
    j('.NO_DESTINATION').html(data.NO_DESTINATION);
    j('.REQUIRED').html(data.REQUIRED);
    j('.TOTAL').text(data.TOTAL);
    j('.ARRIVAL_DETAILS').html("<span class='glyphicon glyphicon-map-marker'></span> "+data.ARRIVAL_DETAILS);
    j('.DEPARTURE_DETAILS').html("<span class='glyphicon glyphicon-screenshot'></span> "+ data.DEPARTURE_DETAILS);
    j('.NR_PAX').html("<span class='glyphicon glyphicon-signal'></span> "+data.NR_PAX);
    j('.OBS').html("<span class='glyphicon glyphicon-paperclip'></span> "+data.OBS);
    j('.PAYMENTS_MET').html("<span class='glyphicon glyphicon-eur'></span> "+data.PAYMENTS_MET);
    j('.CONFIRM').html("<span class='glyphicon glyphicon-thumbs-up'></span> "+data.CONFIRM);
    j('.RETURN_DETAILS').text(data.RETURN_DETAILS);
    j('.PICKUP_DETAILS').text(data.PICK_UP_DETAILS);
    j('.BANK_TRANSFER').text(data.BANK_TRANSFER);
    j('.PAYPAL').text(data.PAYPAL);
    j('.TO_DRIVER').text(data.TO_DRIVER);
    j('.QUOTES').text(data.QUOTES);
    j('.ARRIVAL_FLIGHT_N').text(data.ARRIVAL_FLIGHT_N).next().prop('placeholder',data.ARRIVAL_FLIGHT_N);
    j('.ARRIVAL_FLIGHT_DT').text(data.ARRIVAL_FLIGHT_DT);
    j('.ARRIVAL_FLIGHT_TM').text(data.ARRIVAL_FLIGHT_TM);
    j('.ARRIVAL_FLIGHT_ADDR').text(data.ARRIVAL_FLIGHT_ADDR).next().prop('placeholder',data.ARRIVAL_FLIGHT_ADDR);
    j('.DEPARTURE_FLIGHT_N').text(data.DEPARTURE_FLIGHT_N).next().prop('placeholder',data.DEPARTURE_FLIGHT_N);
    j('.DEPARTURE_FLIGHT_DT').text(data.DEPARTURE_FLIGHT_DT);
    j('.DEPARTURE_FLIGHT_DT_LABEL').prop('placeholder',data.DEPARTURE_FLIGHT_DT);
    j('.DEPARTURE_FLIGHT_TM').text(data.DEPARTURE_FLIGHT_TM);
    j('.DEPARTURE_FLIGHT_TM_LABEL').prop('placeholder',data.DEPARTURE_FLIGHT_TM);
    j('.DEPARTURE_FLIGHT_PICK').text(data.DEPARTURE_FLIGHT_PICK);
    j('.DEPARTURE_FLIGHT_TR_TIME').text(data.DEPARTURE_FLIGHT_TR_TIME)
    j('.DEPARTURE_FLIGHT_TR_TIME_LABEL').prop('placeholder',data.DEPARTURE_FLIGHT_TR_TIME);
    j('.DEPARTURE_FLIGHT_ADDR').text(data.DEPARTURE_FLIGHT_ADDR).next().prop('placeholder',data.DEPARTURE_FLIGHT_ADDR);
    j('.PERSONAL_DETAILS').html("<span class='glyphicon glyphicon-user'></span> "+data.PERSONAL_DETAILS);
    j('.PERSONAL_DETAILS_NAME').text(data.PERSONAL_DETAILS_NAME).next().prop('placeholder',data.PERSONAL_DETAILS_NAME);
    j('.PERSONAL_DETAILS_EMAIL').text(data.PERSONAL_DETAILS_EMAIL).next().prop('placeholder',data.PERSONAL_DETAILS_EMAIL);
    j('.PERSONAL_DETAILS_TEL').text(data.PERSONAL_DETAILS_TEL).next().prop('placeholder',data.PERSONAL_DETAILS_TEL);
    j('.PERSONAL_DETAILS_COUNTRY').text(data.PERSONAL_DETAILS_COUNTRY).next().prop('placeholder',data.PERSONAL_DETAILS_COUNTRY);
    j('.ADULT').text(data.ADULT).next().prop('placeholder',data.ADULT);
    j('.CHILDREN').text(data.CHILDREN).next().prop('placeholder',data.CHILDREN);
    j('.BABY').text(data.BABY).next().prop('placeholder',data.BABY);
    j('.OBS_TXT').text(data.OBS_TXT).next().prop('placeholder',data.OBS_TXT);
    j('.SESSION_EXPIRED').html(data.SESSION_EXPIRED);
    j('.SEE_MORE').html("<span class='glyphicon glyphicon-eye-open'></span> "+data.SEE_MORE);
    j('.ACCEPT_TERMS').text(data.ACCEPT_TERMS);
    j('.TERMS_CONDITIONS_LABEL').text(data.TERMS_CONDITIONS);
    j('.PAYMENTS_MET_LABEL').text(data.PAYMENTS_MET);
    j('.CONFIRM_DETAILS').val(data.CONFIRM_DETAILS);
    j('.PURCHASE').val(data.PURCHASE);
    j('.YOUR_ORDER').val(data.YOUR_ORDER).text(data.YOUR_ORDER);
    j('.TRANSFER_PICK_DETAILS').html("<span class='glyphicon glyphicon-map-marker'></span> "+data.TRANSFER_PICK_DETAILS);
    j('.TRANSFER_PICK_DT').text(data.TRANSFER_PICK_DT);
    j('.TRANSFER_PICK_DT_LABEL').prop('placeholder',data.TRANSFER_PICK_DT);
    j('.TRANSFER_PICK_TM').text(data.TRANSFER_PICK_TM);
    j('.TRANSFER_PICK_TM_LABEL').prop('placeholder',data.TRANSFER_PICK_TM);
    j('.TRANSFER_PICK_ADDR').text(data.TRANSFER_PICK_ADDR).next().prop('placeholder',data.TRANSFER_PICK_ADDR);
    j('.TRANSFER_DEL_DETAILS').html("<span class='glyphicon glyphicon-screenshot'></span> "+ data.TRANSFER_DEL_DETAILS);
    j('.TRANSFER_DEL_DT').text(data.TRANSFER_DEL_DT);
    j('.TRANSFER_DEL_DT_LABEL').prop('placeholder',data.TRANSFER_DEL_DT);
    j('.TRANSFER_DEL_TM').text(data.TRANSFER_DEL_TM);
    j('.TRANSFER_DEL_TM_LABEL').prop('placeholder',data.TRANSFER_DEL_TM);
    j('.TRANSFER_DEL_ADDR').text(data.TRANSFER_DEL_ADDR).next().prop('placeholder',data.TRANSFER_DEL_ADDR);
    j('.GET').text(data.GET);
    j('.CODE_TXT').text(data.CODE_TXT);
    j('.DEBIT').text(data.DEBIT).prop('title',data.DEBIT);
    j('.DATA_ERROR').text(data.DATA_ERROR);
    j('.MIN_PAX').text(data.MIN_PAX);
    j('.TRY_AGAIN').text(data.TRY_AGAIN);
    j('.MAX_PAX').text(data.MAX_PAX);
    j('.ERROR_PAX').text(data.ERROR_PAX);
    j('.PAYMENT_TO_DRIVER').text(data.PAYMENT_TO_DRIVER);
    j('.PAYMENT_PAYPAL').text(data.PAYMENT_PAYPAL);
    j('.PAYMENT_BANK').text(data.PAYMENT_BANK);
    j('.EMAIL_KO').text(data.EMAIL_KO);
    j('.EMAIL_OK').text(data.EMAIL_OK);
    j('.THANK_YOU').text(data.THANK_YOU);
    j('.PAYPAL_PAY').text(data.PAYPAL_PAY);
    j('.REDIRECT').text(data.REDIRECT);
 
    j('.flags').addClass('f-active');
    j('.active-'+vl).removeClass('f-active');
   j('.pay_type').html("<option value=''>"+j('.CHOOSE').val()+" *</option><option value='Bank'>"+j('.BANK_TRANSFER').text()+"</option><option value='Driver'>"+j('.TO_DRIVER').text()+"</option>");
   
   /* CARREGAR CATEGORIAS */
   loaded == '0' ? getCategorias(): false;
  },
  error:function(data){
     j('.middle').hide();
    j("#pop-modal-ko" ).trigger( "click" );
    j('#info-user-ko').html(j('.NO_CONNECTION').text());
   }
});
}

function myTermsConditions(){
j("#pop-modal-terms" ).trigger( "click" );
}

function calculateRecomendTime(){
  stamp = j("#dep_fl_tm").find("input").val().split(":");
  end_stamp = (stamp[0]*60*60)+(stamp[1]*60);
  dur = parseInt(duracao)+parseInt(7200);
  pc_dt= j("#dep_fl_dt").find("input").val().split("/");
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
  j('#dep_fl_pick, #not-recomended').val(recomend_pick_up);
}


/*TAMANHO DO INPUT DO COD PROMO PASSAR PARA VERDE*/
function sizeI(vl){
vl.length+1 >= 1 ? j('.check-code').addClass('btn-success') : j('.check-code').removeClass('btn-success');}
var id_prods='';

/*OBTER TODAS AS CATEGORIAS VISIVEIS*/
function getCategorias(){
    j('.middle').show();
    j('#all-places, #match-places, #all-classes').prop("disabled", true);  
    j('#promo-code').val('').prop('readonly', true);
    cats='';
    dataValue="&action=1";
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    loaded = 1;
    arr=[];
    j('.middle').hide();
    arr =  JSON.parse(data);
 if (arr == null || arr.length < 1){}
    else {
     for(i=0;i<arr.length;i++){
      if (i==0) 
       cats += "<li class='active'><a class='w3-red w3-hover-grey w3-text-white' data-toggle='tab' onclick='showProds("+arr[i].tipo+")'><i class='fa fa-plane w3-margin-right'></i>"+arr[i].nome+"</a></li>";
      else
       cats += "<li><a class='w3-red w3-hover-grey w3-text-white' data-toggle='tab' onclick='showProds("+arr[i].tipo+")'><span class='glyphicon glyphicon-tags'></span>&nbsp; "+arr[i].nome+"</a></li>";
     }
    j('.loader-container').hide();
    j("#all-cats").empty().html(cats);
    showProds(arr[0].tipo);
    j('#types').val(arr[0].tipo);
    j('#search-prods').fadeIn();
   }
   /*COR DO CLIENTE*/
   j('.panel-body,  .type-1 ,.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover').css('background',j('.color').val());
   },
   error:function(data){
   j('.middle').hide();
   j("#pop-modal-ko" ).trigger( "click" );
   j('#info-user-ko').html(j('.NO_CONNECTION').text());
   }
 });
}

/*OBTER TODOS OS LOCAIS DOS PRODUTOS PARA CAMPO ORIGEM*/

function showProds(tipo){
  j('.middle #content-order').show();
  dataValue="&action=2&tipo="+tipo;
   places='';
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    j('.middle').hide();
    arr=[];
    arr =  JSON.parse(data);
    if (arr == null || arr.length < 1){}
    else {
     for(i=0;i<arr.length;i++){
      !arr[i].f ? false : arr[i].f;
      places += "<option value='"+arr[i].f+"'>"+arr[i].f+"</option>"
     }
     j("#all-places").html("<option value=''>"+j('.CHOOSE').val()+" *</option>"+places);
     j('#match-place, #all-classes').val('');
     j('#info-client, #prod-price, #include').empty();
     j('#all-places').prop("disabled", false);
     j('.check-code').removeClass('btn-success');
     j('#all-classes, #match-places').html("<option value=''>"+j('.CHOOSE').val()+" *</option>");
     }
   },
   error:function(data){
    j('.middle').hide();
    j("#pop-modal-ko" ).trigger( "click" );
    j('#info-user-ko').html(j('.NO_CONNECTION').text());
   }
 });
}

function showMatch(origem,tipo){
  if (!origem){
   /*CAMPOS DE PESQUISA A NULL */
   j('#match-places, #all-classes, #promo-code').val('');
   j('#prod-price, #info-client, #include').empty();
   j('.check-code').removeClass('btn-success');
   j("#ret-t").removeAttr('checked');
   j("#ret-f").prop('checked',true);
   j('#match-places, #all-classes').prop("disabled", true);
   j('#promo-code').prop('readonly', true);
}


else{
   j('.middle').show();
  dataValue="&action=3&origem="+origem+"&tipo="+tipo;
  response ='';
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     j('.middle').hide();
    arr=[];
    arr =  JSON.parse(data);
    if (arr == null || arr.length < 1){}
    else {
     for(i=0;i<arr.length;i++){ 
       arr[i].local == origem ? false : to = arr[i].local;
       arr[i].local_fim == origem ? false : to= arr[i].local_fim;
      response += ("<option value='"+to+"'>"+to+"</option>");
      }
     j("#match-places").html("<option value=''>"+j('.CHOOSE').val()+" *</option>"+response);
     j('#all-classes').val('');
     j('#info-client, #prod-price, #include').empty();
     j('#show-prod-price, .img-best_price').hide();
     j("#ret-t").removeAttr('checked');
     j("#ret-f").prop('checked',true);
     j('#match-places').prop("disabled", false);
     j('.check-code').removeClass('btn-success');
     j('#promo-code').val('').prop('readonly', true);
    }
   },
   error:function(data){
    j('.middle').hide();
    j("#pop-modal-ko" ).trigger( "click" );
    j('#info-user-ko').html(j('.NO_CONNECTION').text());
   }
 });
}
}

function showMatch2(destino,tipo,origem){
  if (!destino){
   /*CAMPOS DE PESQUISA A NULL */
   j('#all-classes, #promo-code').val('');
   j('#prod-price, #info-client, #include').empty();
   j('.check-code').removeClass('btn-success');
   j("#ret-t").removeAttr('checked');
   j("#ret-f").prop('checked',true);
   j('#match-places, #all-classes').prop("disabled", true);
   j('#promo-code').prop('readonly', true);
}
else{
 j('.middle').show();
dataValue="&action=4&origem="+origem+"&tipo="+tipo+"&destino="+destino;
response ='';
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     j('.middle').hide();
    arr=[];
    arr =  JSON.parse(data);
    id_prods = arr[0].id;
    duracao=arr[0].duracao;
    showClasses();
   },
   error:function(data){
    j('.middle').hide();
    j("#pop-modal-ko" ).trigger( "click" );
   j('#info-user-ko').html(j('.NO_CONNECTION').text());
   }
 });
}
}

function showClasses(){
  j('.middle').show();
 dataValue="&action=5&tipo="+j('#types').val()+"&id_prod="+id_prods;
 response ='';
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
   j('.middle').hide();
    arr=[];    
    arr =  JSON.parse(data);
     for(i=0;i<arr.length;i++){ 
      response += ("<option data-min='"+arr[i].min+"' data-max='"+arr[i].max+"' value='"+arr[i].id+"'>"+arr[i].nome+"</option>");
      }
      j("#all-classes").html("<option value=''>"+j('.CHOOSE').val()+" *</option>"+response).prop("disabled", false);
      j('#promo-code').val('').prop('readonly', true);
      j('#prod-price, #info-client, #include').empty();
      j('.check-code').removeClass('btn-success');
      j("#ret-t").removeAttr('checked');
      j("#ret-f").prop('checked',true);
   },
   error:function(data){
   j('.middle').hide();
   j("#pop-modal-ko" ).trigger( "click" );
   j('#info-user-ko').html(j('.NO_CONNECTION').text());
   }
 });
}

function showProdPrice(vl){

min = j('#all-classes option:selected').data('min');
max = j('#all-classes option:selected').data('max');

response ='';
if( !j('#all-places').val() || !j('#match-places').val() || !j('#all-classes').val()){
 j('#match-place, #all-classes').val(''); 
 j('#info-client, #prod_price, #include').empty(); 
 j('#show-prod-price, .img-best_price').hide();
 j('.check-code').removeClass('btn-success');
 return;
}

else{
     j('.middle').show();
    dataValue="&action=6&tipo="+j('#types').val()+"&id_label="+vl+"&id_prod="+id_prods;
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    j('.middle').hide();
    arr=[];
    arr =  JSON.parse(data);
    var from = j("#all-places option:selected").text();
    var to = j("#match-places option:selected").text();
    var pax = j("#all-classes option:selected").text();
    j('#prod-price').html("<font>"+parseFloat(arr[0].valor).toFixed(2)+"€</font><img class='low-price hidden-xs' src='front/images/bestprice.png';/>");
    j('#show-prod-price').fadeIn();
    j('#promo-code').prop('readonly', false);
    j('.check-code').removeClass('btn-success');
    j("#ret-t").removeAttr('checked');
    j("#ret-f").prop('checked',true);
    pp = arr[0].valor;
    j("input[type=radio]:checked").val() == 'No' ? oneway = "<font>"+j('.NO').val()+"</font>" : oneway = "<font>"+j('.YES').val()+"</font>" ;

    j('#info-client').html("<label>"+j('.FROM').text()+"</label> "+from+" <label> "+j('.TO').text()+" </label> "+to+" <label> "+j('.PASSENGERS').text()+" </label> "+pax+" <label>"+j('.RETURN').text()+"</label> "+oneway+" <label>"+j('.TOTAL').text()+" </label> "+parseFloat(arr[0].valor).toFixed(2)+"€");

   j('html, body').animate({ scrollTop: j('#search-prods').offset().top }, 'slow');

   },
   error:function(data){
    j('.middle').hide();
    j("#pop-modal-ko" ).trigger( "click" );
    j('#info-user-ko').html(j('.NO_CONNECTION').text());
   }
 });
}
}

function showReturn(vl){
response ='';
if( !j('#all-places').val() || !j('#match-places').val() || !j('#all-classes').val()){
   j("#pop-modal-ko" ).trigger( "click" );
   j('#info-user-ko').html(j('.REQUIRED').text());
   j('#prod-price, #info-client, #include').empty();
   j('.check-code').removeClass('btn-success');
   j("#ret-t").removeAttr('checked');
   j("#ret-f").prop('checked',true);
 return;
}
else{
     j('.middle').show();
dataValue="&action=7&tipo="+j('#types').val()+"&id_label="+j('#all-classes').val()+"&id_prod="+id_prods+"&return="+vl;
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     j('.middle').hide();
    arr=[];
    arr =  JSON.parse(data);
     j('#info-client').html("<h2>"+parseFloat(arr[0].valor).toFixed(2)+"€</h2>");
    var from = j("#all-places option:selected").text();
    var to = j("#match-places option:selected").text();
    var pax = j("#all-classes option:selected").text();
    j('#include').empty();
    j('#prod-price').html("<font>"+parseFloat(arr[0].valor).toFixed(2)+"€</font><img class='low-price hidden-xs' src='front/images/bestprice.png';/>");
    j('#show-prod-price').fadeIn();
    pp = arr[0].valor;
    j("input[type=radio]:checked").val() == 'No' ? oneway = "<font>"+j('.NO').text()+"</font>" : oneway = "<font>"+j('.YES').text()+"</font>" ;
    j('#info-client').html("<label>"+j('.FROM').text()+"</label> "+from+" <label> "+j('.TO').text()+" </label> "+to+" <label> "+j('.PASSENGERS').text()+" </label> "+pax+" <label>"+j('.RETURN').text()+"</label> "+oneway+" <label>"+j('.TOTAL').text()+" </label> "+parseFloat(arr[0].valor).toFixed(2)+"€");
  
  j('.check-code').removeClass('btn-success');

  j('html, body').animate({ scrollTop: j('#search-prods').offset().top }, 'slow');
   },
   error:function(data){
   j('.middle').hide();
   j("#pop-modal-ko" ).trigger( "click" );
   j('#info-user-ko').html(j('.NO_CONNECTION').text());
   }
 });
}
}

function showVerificationPromo(vl){
response ='';
var oneway = j("input[type=radio]:checked").val();
if( !j('#all-places').val() || !j('#match-places').val() || !j('#all-classes').val()){
   j('#match-place, #all-classes').val(''); 
   j('#info-client').empty();
   j('#show-prod-price, .img-best_price').hide();
 return;
}

else{
   j('.middle').show();
dataValue="&action=8&tipo="+j('#types').val()+"&id_label="+j('#all-classes').val()+"&id_prod="+id_prods+"&return="+oneway+"&promo="+vl;
    j.ajax({
    url:url+'requests.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     j('.middle').hide();
    arr=[];
    arr =  JSON.parse(data);
    j('#info-client').html("<h2>"+parseFloat(arr[0].valor).toFixed(2)+"€");
    var from = j("#all-places option:selected").text();
    var to = j("#match-places option:selected").text();
    var pax = j("#all-classes option:selected").text()
    j('#show-prod-price').fadeIn();
    j("input[type=radio]:checked").val() == 'No' ? oneway = "<font class='NO'>"+j('.NO').text()+"</font>" : oneway = "<font class='YES'>"+j('.YES').text()+"</font>" ;
    
 /* SE CODIGO INVALIDO NA RESPOSTA*/

    if (arr[0].promo == 0 ){

    j('#info-client').html("<label class='FROM'>"+j('.FROM').text()+"</label> "+from+" <label class='TO'> "+j('.TO').text()+" </label> "+to+" <label class='PASSENGERS'> "+j('.PASSENGERS').text()+" </label> "+pax+" <label class='RETURN'>"+j('.RETURN').text()+"</label> "+oneway+" <label class='TOTAL'>"+j('.TOTAL').text()+" </label> "+parseFloat(arr[0].valor).toFixed(2)+"€");
  pp = arr[0].valor;
 j('#prod-price').html("<font>"+parseFloat(arr[0].valor).toFixed(2)+"€</font><img class='low-price hidden-xs' src='front/images/bestprice.png';/>");
    j("#pop-modal-ko").trigger( "click" );
    j('#info-user-ko').html(j('.NO_CODE').text());
   }

/* SE CODIGO VALIDO NA RESPOSTA*/
 
   else if (arr[0].promo == 1 ){
    pp = arr[0].desconto;
    j('#info-client').html("<label class='FROM'>"+j('.FROM').text()+"</label> "+from+" <label class='TO'> "+j('.TO').text()+" </label> "+to+" <label class='PASSENGERS'> "+j('.PASSENGERS').text()+" </label> "+pax+" <label class='RETURN'>"+j('.RETURN').text()+"</label> "+oneway+" <label class='TOTAL'>"+j('.TOTAL').text()+"</label> "+parseFloat(arr[0].desconto).toFixed(2)+"€");
    j('#prod-price').html("<font style='font-size:15px; color:#d9534f; text-decoration: line-through;'>"+parseFloat(arr[0].valor).toFixed(2)+"€</font>&nbsp;<font style='color:#333;'>"+parseFloat(arr[0].desconto).toFixed(2)+"€</font><img class='low-price hidden-xs' src='front/images/bestprice.png';/>");
}
},
   error:function(data){
    j('.middle').hide();
    j("#pop-modal-ko" ).trigger( "click" );
    j('#info-user-ko').html(j('.NO_CONNECTION').text());
   }
 });
}
}

function callDefinitions(){
 dataValue='action=99';
 j.ajax({ url:url+'requests.php',
   data:dataValue,
   type:'POST', 
   success:function(data){
     arr=[];
     arr =  JSON.parse(data);
     if (arr == null || arr.length < 1){}
     else {
          j('#reserved_time').val(arr[0].hora_reserva);
          tel = arr[0].tel;
          arr[0].termos ? j('#info-user-terms').html(arr[0].termos) : j('#info-user-terms').html('Terms & Conditions');
          arr[0].promo_name;
          arr[0].promo_value;
          arr[0].color ? j('.color').val(arr[0].color) : j('.color').val('#EEE');
          arr[1].nm_code ? j('.nm_code').val(arr[1].nm_code) : j('.nm_code').val('');
          arr[1].percentagem ?  j('.percentagem').val(arr[1].percentagem) : j('.percentagem').val('');
          if( arr[1].nm_code && arr[1].percentagem){
          j('.promo-display').html("<font class='GET'></font><strong> "+j('.percentagem').val()+"% </strong><font class='CODE_TXT'></font><strong> "+j('.nm_code').val()+" </strong>");
          j('.promo-label-display').show();
          }
     }
     /*CARREGAR TAGS DA LINGUAGEM*/
     languages('en-gb');
    },
    error:function(data){}
  });
}

</script>

