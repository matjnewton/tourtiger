<style>
.btn-primary {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;}

h5 {
    padding: 4px;
    background: #333;
    color: #FFF;
    font-size: 14px;
}

h5.uppercase{
text-align:center;
text-transform: uppercase;
}

</style>

<!-- SE CAMPO ORIGEM OU DESTINO AEROPORTO COM IDA E VOLTA  -->
<form id='trans'>
<input type='hidden' name ='language' class='LANGUAGE'>
<div class='row'>
<div class="col-lg-10 col-lg-offset-1" style='padding-top:18px;'>
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title ARRIVAL_DETAILS"></h3></div>
<div class="panel-body">

<div class="row">
<div class="col-lg-3 col-md-6 col-xs-12 form-group">
<font class='ARRIVAL_FLIGHT_N'></font>
<input type="text" required class="form-control" id="arr_fl_nr" name="arr_fl_nr"/>
</div>

 <div class="col-lg-3 col-md-6 col-xs-12 form-group">
  <font class='ARRIVAL_FLIGHT_DT'></font>
  <div class='input-group date' id="arr_fl_dt">
  <input type='text' name="arr_fl_dt" required class="form-control" readonly/><span class="btn-primary input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
  </div>
 </div>

 <div class="col-lg-2 col-md-6 col-xs-12 form-group">
 <font class='ARRIVAL_FLIGHT_TM'></font>
 <div class='input-group date' id='arr_fl_tm'>
  <input type='text' name="arr_fl_tm" required class="form-control" readonly/><span class="btn-primary input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
 </div>
</div>

<div class="col-lg-4 col-md-6 col-xs-12 form-group">
<font class='ARRIVAL_FLIGHT_ADDR'></font>
<input type="text" class="form-control" id="arr_fl_addr" name="arr_fl_addr"/>
</div>
</div>

</div>
<div class="panel-footer"></div>
</div>
</div>
</div>

<div class='row'>
<div class="col-lg-10 col-lg-offset-1">
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title DEPARTURE_DETAILS"></h3></div>
<div class="panel-body">

<div class="col-lg-3 col-md-6 col-xs-12 form-group">
<font class='DEPARTURE_FLIGHT_N'></font>
<input type="text" required class="form-control" id="dep_fl_nr" name="dep_fl_nr"/>
</div>

<div class="col-lg-3 col-md-6 col-xs-12 form-group">
 <font class='DEPARTURE_FLIGHT_DT'> *</font>
  <div class='input-group date' id="dep_fl_dt">
  <input type='text' required name="dep_fl_dt" class="form-control DEPARTURE_FLIGHT_DT_LABEL"/><span class="btn-primary input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
  </div>
 </div>

 <div class="col-lg-3 col-md-6 col-xs-12 form-group">
 <font class='DEPARTURE_FLIGHT_TM'> *</font>
 <div class='input-group date' id='dep_fl_tm'>
  <input type='text'  name="dep_fl_tm" required class="form-control DEPARTURE_FLIGHT_TM_LABEL"/><span class="btn-primary input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
 </div>
</div>

<div class="col-lg-3 col-md-6 col-xs-12 form-group">
<font class='DEPARTURE_FLIGHT_PICK'></font>
<input type="text" readonly class="form-control" id="dep_fl_pick"/>
</div>


<div class="col-lg-3 col-md-5 col-xs-12 form-group">
<font class='DEPARTURE_FLIGHT_TR_TIME'></font>
  <div class='input-group date' id="dep_fl_tr_time">
  <input type='text' id='not-recomended' name="dep_fl_tr_time" required class="form-control DEPARTURE_FLIGHT_TR_TIME_LABEL"/><span class="btn-primary input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
  </div>
</div>

<div class="col-lg-9 col-md-7 col-xs-12 form-group">
<font class='DEPARTURE_FLIGHT_ADDR'></font>
<input type="text" class="form-control" id="dep_fl_addr" name="dep_fl_addr"/>
</div>

</div>
<div class="panel-footer"></div>
</div>
</div>
</div>

<!-- DADOS -->
<div class='row'>
<div class="col-lg-10 col-lg-offset-1">
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title PERSONAL_DETAILS"></h3></div>
<div class="panel-body">

<div class="col-lg-3 col-md-6 col-xs-12 form-group">
<font class='PERSONAL_DETAILS_NAME'></font>
<input type="text" required class="form-control" id="per_de_name" name="per_de_name" />
</div>
<div class="col-lg-3 col-md-6 col-xs-12 form-group">
<font class='PERSONAL_DETAILS_EMAIL'></font>
<input type="email" required class="form-control" id="per_de_email" name="per_de_email" />
</div>

<div class="col-lg-3 col-md-6 col-xs-12 form-group">
<font class='PERSONAL_DETAILS_TEL'></font>
<input type="tel" class="form-control" id="per_de_tel" name="per_de_tel" />
</div>

<div class="col-lg-3 col-md-6 col-xs-12 form-group">
<font class='PERSONAL_DETAILS_COUNTRY'></font>
<select class="form-control" id="per_de_country" name="per_de_country">
</select>
</div>

</div>
<div class="panel-footer"></div>
</div>

<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title NR_PAX"></h3></div>
<div class="panel-body">

<div class="col-lg-4 col-md-6 col-xs-6 form-group">
<font class='ADULT'></font>
<input type="number" min='1' value='1' required class="form-control" id="nr_pax_adu" name="nr_pax_adu"/>
</div>
<div class="col-lg-4 col-md-6 col-xs-6 form-group">
<font class='CHILDREN'></font>
<input type="number" min='0' value='0' class="form-control" id="nr_pax_chi" name="nr_pax_chi" />
</div>
<div class="col-lg-4 col-md-6 col-xs-6 form-group">
<font class='BABY'></font>
<input type="number" min='0' value='0' class="form-control" id="nr_pax_ba" name="nr_pax_ba" />
</div>
</div>
<div class="panel-footer"></div>
</div>

<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title OBS"></h3></div>
<div class="panel-body">
<div class="col-lg-12 form-group">
<font class='OBS_TXT'></font>
<textarea class="form-control" id="obx_txt" name="obs_txt" rows="5" cols="50"></textarea>
</div>
</div>
<div class="panel-footer"></div>
</div>


<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title PAYMENTS_MET"></h3></div>
<div class="panel-body">
<div class="col-lg-6 col-xs-12 form-group">
<font class='PAYMENTS_MET_LABEL'></font>
<select required class="form-control pay_type" id="payments_type" name="payments_type">
</select>
</div>
<div class="col-lg-6 col-xs-12 form-group">
<font class='TERMS_CONDITIONS_LABEL'></font>
<br>
<input type="checkbox" required name="shop-terms" value="shop-terms"> <p style="margin: -25px 27px 10px;" class='ACCEPT_TERMS'></p>
<a style="float:right;" class="btn btn-primary SEE_MORE" onclick='myTermsConditions()'></a>
</div>
</div>
<div class="panel-footer">
<div class="row">
<button type="submit" name='submit' class="btn btn-success CONFIRM" style="float:right;margin-right: 10px;"></button>
</div>
</div></div>

</div>
</div>
</form>

<script>

antes=parseInt(j('#reserved_time').val());
!antes ? antes = 0 : false; 
var date = new Date();
d = date.setDate(date.getDate());
h = date.setHours(date.getHours() + antes);
flag_hr = 0;
flag_dt = 0;

  j(function () {
   
   //!$('.LANGUAGE').val() ? $('.LANGUAGE').val(<?php echo json_encode(substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2)) ?>) : $('.LANGUAGE').val();

   j('#arr_fl_dt').datetimepicker({ignoreReadonly: true, minDate: h, format: 'DD/MM/YYYY', locale: 'en-gb'});

   j('#arr_fl_tm').datetimepicker({ignoreReadonly: true, minDate: h, format: 'HH:mm', locale: 'en-gb'});

   j('#dep_fl_dt').datetimepicker({useCurrent: false, ignoreReadonly: true, minDate: h, format: 'DD/MM/YYYY', locale: 'en-gb'});

   j('#dep_fl_tm').datetimepicker({ignoreReadonly: true, format: 'HH:mm',locale: 'en-gb'});

   j("#arr_fl_dt").on("dp.change", function (e) {j('#dep_fl_dt, #dep_fl_tr_time').data("DateTimePicker").minDate(e.date);});
  
   j('#dep_fl_tr_time').datetimepicker({useCurrent: false, ignoreReadonly: true,minDate:h, locale: 'en-gb', sideBySide: true});

   j("#dep_fl_dt, #dep_fl_tr_time").on("dp.change", function (e) {j('#arr_fl_dt').data("DateTimePicker").maxDate(e.date); });
     
   j('.panel-body,  .type-1 ,.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover').css('background',j('.color').val());   
   
j('#per_de_country').html('<option value=""> </option><option value="AUS">Áustria</option><option value="DE">Alemanha</option><option value="AST">Austrália</option><option value="BR">Brasil</option><option value="BUL">Bulgária</option><option value="BEL">Bélgica</option><option value="CAN">Canadá</option><option value="CH">China</option><option value="DIN">Dinamarca</option><option value="EGP">Egito</option><option value="ESP">Espanha</option><option value="USA">Estados Unidos</option><option value="FR">França</option><option value="GR">Grécia</option><option value="HL">Holanda</option><option value="HK">Hong Kong</option><option value="HG">Hungria</option><option value="IRL">Irlanda</option><option value="IT">Itália</option><option value="JP">Japão</option><option value="LX">Luxemburgo</option><option value="MAL">Malta</option><option value="MCB">Moçambique</option><option value="MX">México</option><option value="MN">Mónaco</option><option value="NRG">Noruega</option><option value="PL">Polónia</option><option value="PT">Portugal</option><option value="GB">Reino Unido</option><option value="RM">Romania</option><option value="RS">Rússia</option><option value="SUI">Suíça</option><option value="IND">Índia</option><option value="OTR">Outro</option>');


   j('#dep_fl_tm input').blur(function(){
    !j( this ).val()?flag_hr=0:flag_hr=1;
    if (flag_dt == 1 && flag_hr==1)
     calculateRecomendTime();
    });

  j('#dep_fl_dt input').blur(function() {
   !j( this ).val()?flag_dt=0:flag_dt=1;
   if (flag_dt == 1 && flag_hr==1)
    calculateRecomendTime();
  });


j('#trans').on('submit',function(e){
e.preventDefault();
!j('#nr_pax_adu').val() ? ad=0 : ad=j('#nr_pax_adu').val();
!j('#nr_pax_chi').val() ? ch=0 : ch=j('#nr_pax_chi').val();
!j('#nr_pax_ba').val() ? bb=0 : bb=j('#nr_pax_ba').val();
total = parseInt(ad)+parseInt(ch)+parseInt(bb);

if ( total < min ){
j("#pop-modal-ko" ).trigger( "click" );
j('#info-user-ko').html(j('.MIN_PAX').text()+"<strong>"+min+"</strong>.<br>"+j('.ERROR_PAX').text()+"<strong>"+total+"</strong>.<br>"+j('.TRY_AGAIN').text());
return;
}

else if ( total > max ){
j("#pop-modal-ko" ).trigger( "click" );
j('#info-user-ko').html(j('.MAX_PAX').text()+"<strong>"+max+"</strong>.<br>"+j('.ERROR_PAX').text()+"<strong>"+total+"</strong>.<br>"+j('.TRY_AGAIN').text());
return;
}

else{
  j('.middle').show();
  dataValue=j( this ).serialize()+"&prod="+id_prods+"&label="+j('#all-classes').val()+"&action=9&oneway="+j('input[type=radio]:checked').val()+"&promo="+j('#promo-code').val()+"&from="+j('#all-places').val()+"&to="+j('#match-places').val()+"&pax="+j('#all-classes option:selected').text()+"&pp="+pp;
j.ajax({
      type: "POST",
      url: url+'requests.php',
      data: dataValue,
      success: function(data){
      j('.middle').hide();
      arr=[];
      arr =  JSON.parse(data);
      if(arr[0].errors == 1){
       j("#pop-modal-ko" ).trigger( "click" );
       j('#info-user-ko').html(arr[0].invalid);
      }
      else{
      pay='';

arr[0].payments == 'Bank' ? pay= j('.BANK_TRANSFER').text() : false; 
arr[0].payments == 'Driver' ? pay = j('.TO_DRIVER').text() : false; 
arr[0].payments == 'Paypal' ? pay = j('.PAYPAL').text() : false; 
!arr[0].obs ? arr[0].obs = '-/-' : false;
!arr[0].promo ? arr[0].promo = '-/-' : false;
!arr[0].voo_che_mor ? arr[0].voo_che_mor = '-/-' : false;
!arr[0].voo_dep_mor ? arr[0].voo_dep_mor = '-/-' : false;
!arr[0].tel ? arr[0].tel = '-/-' : false;
!arr[0].country ? arr[0].country = '-/-' : false;
arr[0].oneway =='Yes' ? arr[0].oneway = j('.YES').val() : arr[0].oneway = j('.NO').val();

purchase ="<form class='twowayairport'><h5 class='uppercase'>"+j('.YOUR_ORDER').val()+"</h5><label>"+j('.FROM').val()+"</label> "+arr[0].from+"<input type='hidden' name='from' value ='"+arr[0].from+"'><br><label>"+j('.TO').val()+"</font></label> "+arr[0].to+"<input type='hidden' name='to' value ='"+arr[0].to+"'><br><label>"+j('.PASSENGERS').val()+"</label> "+arr[0].pax+"<input type='hidden' name='pax' value ='"+arr[0].pax+"'><br><label>"+j('.RETURN').val()+"</label> "+arr[0].oneway+"<input type='hidden' name='oneway' value ='"+arr[0].oneway+"'><br><label>Promo:</label> "+arr[0].promo+"<input type='hidden' name='promo' value ='"+arr[0].promo+"'><br><label>Total:</label> "+parseFloat(arr[0].total).toFixed(2)+"€ <input type='hidden' name='pp' value ='"+arr[0].total+"'><br><h5>"+j('.ARRIVAL_DETAILS').html()+"</h5><label>"+j('.ARRIVAL_FLIGHT_N').text()+":</label> "+arr[0].voo_n_che+" <input type='hidden' name='voo_n_che' value ='"+arr[0].voo_n_che+"'><br><label>"+j('.ARRIVAL_FLIGHT_DT').text()+":</label> "+arr[0].voo_che_dt+"<br><input type='hidden' name='voo_che_dt' value ='"+arr[0].voo_che_dt+"'><label>"+j('.ARRIVAL_FLIGHT_TM').text()+":</label> "+arr[0].voo_che_tm+"<br><input type='hidden' name='voo_che_tm' value ='"+arr[0].voo_che_tm+"'><label>"+j('.ARRIVAL_FLIGHT_ADDR').text()+":</label> "+arr[0].voo_che_mor+"<input type='hidden' name='voo_che_mor' value ='"+arr[0].voo_che_mor+"'> <h5>"+j('.DEPARTURE_DETAILS').html()+"</h5><label>"+j('.DEPARTURE_FLIGHT_N').text()+":</label> "+arr[0].voo_n_dep+" <input type='hidden' name='voo_n_dep' value ='"+arr[0].voo_n_dep+"'><br><label>"+j('.DEPARTURE_FLIGHT_DT').text()+":</label> "+arr[0].voo_dep_dt+"<input type='hidden' name='voo_dep_dt' value ='"+arr[0].voo_dep_dt+"'><br><label>"+j('.DEPARTURE_FLIGHT_TM').text()+":</label> "+arr[0].voo_dep_tm+"<input type='hidden' name='voo_dep_tm' value ='"+arr[0].voo_dep_tm+"'><br><label>"+j('.DEPARTURE_FLIGHT_TR_TIME').text()+":</label> "+arr[0].voo_dep_pick+"<input type='hidden' name='voo_dep_pick' value ='"+arr[0].voo_dep_pick+"'><br><label>"+j('.DEPARTURE_FLIGHT_ADDR').text()+":</label> "+arr[0].voo_dep_mor+"<br><input type='hidden' name='voo_dep_mor' value ='"+arr[0].voo_dep_mor+"'><h5>"+j('.PERSONAL_DETAILS').html()+"</h5><label>"+j('.PERSONAL_DETAILS_NAME').text()+":</label> "+arr[0].nome+"<input type='hidden' name='nome' value ='"+arr[0].nome+"'><br><label>"+j('.PERSONAL_DETAILS_EMAIL').text()+":</label> "+arr[0].email+"<input type='hidden' name='email' value ='"+arr[0].email+"'><br><label>"+j('.PERSONAL_DETAILS_TEL').text()+":</label> "+arr[0].tel+"<input type='hidden' name='tel' value ='"+arr[0].tel+"'><br><label>"+j('.PERSONAL_DETAILS_COUNTRY').text()+":</label> "+arr[0].country+"<input type='hidden' name='country' value ='"+arr[0].country+"'><br><h5>"+j('.NR_PAX').html()+"</h5><label>"+j('.ADULT').text()+":</label> "+arr[0].adult+"<input type='hidden' name='adult' value ='"+arr[0].adult+"'><br><label>"+j('.CHILDREN').text()+":</label> "+arr[0].children+"<input type='hidden' name='children' value ='"+arr[0].children+"'><br><label>"+j('.BABY').text()+":</label> "+arr[0].baby+"<input type='hidden' name='baby' value ='"+arr[0].baby+"'><br><h5>"+j('.OBS').html()+"</h5><label>"+j('.OBS_TXT').text()+":</label> "+arr[0].obs+"<input type='hidden' name='obs' value ='"+arr[0].obs+"'><br><h5>"+j('.PAYMENTS_MET').html()+"</h5><label>"+j('.PAYMENTS_MET_LABEL').text()+":</label> "+pay+"<input type='hidden' name='payments' value ='"+arr[0].payments+"'><br><input type='hidden' value='"+arr[0].id+"' name='prod'><input type='hidden' value='"+arr[0].id_price+"' name='label'><input type='hidden' value='"+arr[0].lang+"' name='language'></form>";

      confirmPurchase(purchase);

    }
    },
     error:function(data) {
      j('.middle').hide();
    }
});

}
languages('en-gb');
});


function confirmPurchase(purchase){
bootbox.dialog({
  message: purchase,
    title: "<span style='color:#f0ad4e;'><span class='glyphicon glyphicon-exclamation-sign'></span> "+j('.CONFIRM_DETAILS').val(),
  buttons: {
    default: {
      label: "<span class='glyphicon glyphicon-remove-sign'></span> "+j('.CLOSE').val(),
      className: "btn-default", 
      callback: function() {
      j('body').css('padding-right','0');
     }
    },
    danger: {
      label: "<span class='glyphicon glyphicon-ok'></span> "+j('.PURCHASE').val(),
      className: "btn-success",
      callback: function() {
      j('body').css('padding-right','0');
      j('.middle').show();
      dataValue=j('.twowayairport').serialize()+'&action=1';
       j.ajax({
        type: "POST",
        url: url_forms+'form1_t.php',
        data: dataValue,
        success: function(data){
         arr=[];
         arr =  JSON.parse(data);
         j('.middle').hide();
         if(arr[0].errors == 1){
          j("#pop-modal-ko" ).trigger( "click" );
          j('#info-user-ko').html(arr[0].invalid);
         }
         else if(arr[0].errors == 0){
          j('body').css('padding-right','0');
          j('#include').empty();
          showProds(j('#types').val());
          j('#prod-price, #info-client, #include').empty();
          j('.check-code').removeClass('btn-success');
          j("#ret-t").removeAttr('checked');
          j("#ret-f").prop('checked',true);
          j('#match-places, #all-classes').prop("disabled", true);
          j('#promo-code').prop('readonly', true);
          j('#info-user-ok').addClass('pop-txt');
           if (arr[0].invalid == 10){ 
             j("#pop-modal-ok" ).trigger("click" );
             j('#info-user-ok').html(j(".PAYMENT_TO_DRIVER").text()+'<br>'+j(".EMAIL_KO").text()+'<a class="btn btn-warning" href="tel:'+tel+'">'+tel+'</a><br>'+j(".YOUR_ORDER").text()+' <strong>'+arr[0].order+'</strong><br>'+j(".THANK_YOU").text());
            }
            else if (arr[0].invalid == 11){
             j("#pop-modal-ok" ).trigger( "click" );
             j('#info-user-ok').html(j(".PAYMENT_TO_DRIVER").text()+'<br>'+j(".EMAIL_OK").text()+' <strong>'+arr[0].order+'</strong><br>'+j(".THANK_YOU").text());
            }
            else if (arr[0].invalid == 20){ 
             j("#pop-modal-ok" ).trigger( "click" );
             j('#info-user-ok').html(j(".PAYMENT_BANK").text()+'<br>'+j(".EMAIL_KO").text()+'<a class="btn btn-warning" href="tel:'+tel+'">'+tel+'</a><br>'+j(".YOUR_ORDER").text()+' <strong>'+arr[0].order+'</strong><br>'+j(".THANK_YOU").text());
            }
            else if (arr[0].invalid == 21){ 
             j("#pop-modal-ok" ).trigger( "click" );
             j('#info-user-ok').html(j(".PAYMENT_BANK").text()+'<br>'+j(".EMAIL_OK").text()+' <strong>'+arr[0].order+'</strong><br>'+j(".THANK_YOU").text());
            }
            else if (arr[0].invalid == 30){ 
             j("#pop-modal-ok" ).trigger( "click" );
             j('#info-user-ok').html(j(".PAYMENT_PAYPAL").text()+'<br>'+j(".EMAIL_KO").text()+'<a class="btn btn-warning" href="tel:'+tel+'">'+tel+'</a><br>'+j(".YOUR_ORDER").text()+' <strong>'+arr[0].order+'</strong><br>'+j(".THANK_YOU").text());
            }
            else if (arr[0].invalid == 31){
             j("#pop-modal-ok" ).trigger( "click" );
             j('#info-user-ok').html(j(".REDIRECT").text()+'<br>'+j(".EMAIL_OK").text()+ '<strong> '+arr[0].order+'</strong><br>'+j(".THANK_YOU").text()+'<br><form class="paypal" action="'+url_forms+'paypal/payments.php" method="post" id="paypal_form" target="_blank"><input type="hidden" name="cmd" value="_xclick" /><input type="hidden" name="no_note" value="1"/><input type="hidden" name="lc" value="EUR" /><input type="hidden" name="currency_code" value="EUR" /><input type="hidden" name="item_number" value="'+arr[0].order+'"/><input type="hidden" name="item_date" value="'+arr[0].data_criacao+'"/><button type="submit" class="btn btn-success" name="submit" id="f1-bt">'+j(".PAYPAL_PAY").text()+'</button></form>');

    j('html, body').animate({ scrollTop: j('#all-cats').offset().top -200 }, 'slow');

    setTimeout(function(){j("#f1-bt" ).trigger( "click" );}, 2000);


            }
        }
      },
      error:function(data){
        j('.middle').hide();
        j("#pop-modal-ko" ).trigger( "click" );
        j('#info-user-ko').html(j('.NO_CONNECTION').text());
      }
   });
      }
    },
  }
});
}

j("#per_de_country").select2();
languages('en-gb');
});

</script>


