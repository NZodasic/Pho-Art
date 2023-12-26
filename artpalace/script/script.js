$("#bars").click(function () {
  $("#bars").toggleClass("bars_active");
}),
  $("#searchBtn").click(function () {
    $(".search").toggleClass("searchBtn");
  }),
  window.addEventListener("scroll", function () {
    $(this).scrollTop() >= 700
      ? $(".go-to-top").fadeIn()
      : $(".go-to-top").fadeOut();
  }),
  $(".go-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 });
  });
const lazyImages = document.querySelectorAll("[lazy]"),
  lazyImageObserver = new IntersectionObserver((t, e) => {
    t.forEach((t) => {
      if (t.isIntersecting) {
        const s = t.target,
          a = s.dataset.src;
        "img" === s.tagName.toLowerCase()
          ? (s.src = a)
          : (s.style.backgroundImage = "url('" + a + "')"),
          s.removeAttribute("lazy"),
          e.unobserve(s);
      }
    });
  });
lazyImages.forEach((t) => {
  lazyImageObserver.observe(t);
}),
  (address_2 = localStorage.getItem("address_2_saved")) &&
    ($('select[name="calc_shipping_district"] option').each(function () {
      $(this).text() == address_2 && $(this).attr("selected", "");
    }),
    $("input.billing_address_2").attr("value", address_2)),
  (district = localStorage.getItem("district")) &&
    ($('select[name="calc_shipping_district"]').html(district),
    $('select[name="calc_shipping_district"]').on("change", function () {
      var t = $(this).children("option:selected");
      t.attr("selected", ""),
        $('select[name="calc_shipping_district"] option')
          .not(t)
          .removeAttr("selected"),
        (address_2 = t.text()),
        $("input.billing_address_2").attr("value", address_2),
        (district = $('select[name="calc_shipping_district"]').html()),
        localStorage.setItem("district", district),
        localStorage.setItem("address_2_saved", address_2);
    })),
  $('select[name="calc_shipping_provinces"]').each(function () {
    var t = $(this),
      e = "";
    c.forEach(function (s, a) {
      (e += "<option value=" + (a += 1) + ">" + s + "</option>"),
        t.html('<option value="">Tỉnh / Thành phố</option>' + e),
        (address_1 = localStorage.getItem("address_1_saved")) &&
          ($('select[name="calc_shipping_provinces"] option').each(function () {
            $(this).text() == address_1 && $(this).attr("selected", "");
          }),
          $("input.billing_address_1").attr("value", address_1)),
        t.on("change", function (e) {
          e = t.children("option:selected").index() - 1;
          var s = "";
          if ("" != t.val()) {
            arr[e].forEach(function (t) {
              (s += '<option value="' + t + '">' + t + "</option>"),
                $('select[name="calc_shipping_district"]').html(
                  '<option value="">Quận / Huyện</option>' + s
                );
            });
            var a = t.children("option:selected").text(),
              i = $('select[name="calc_shipping_district"]').html();
            localStorage.setItem("address_1_saved", a),
              localStorage.setItem("district", i),
              $('select[name="calc_shipping_district"]').on(
                "change",
                function () {
                  var t = $(this).children("option:selected");
                  t.attr("selected", ""),
                    $('select[name="calc_shipping_district"] option')
                      .not(t)
                      .removeAttr("selected");
                  var e = t.text();
                  $("input.billing_address_2").attr("value", e),
                    (i = $('select[name="calc_shipping_district"]').html()),
                    localStorage.setItem("district", i),
                    localStorage.setItem("address_2_saved", e);
                }
              );
          } else $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>'), (i = $('select[name="calc_shipping_district"]').html()), localStorage.setItem("district", i), localStorage.removeItem("address_1_saved", a);
        });
    });
  });
$(".go-to-top").hover(
  function () {
    $(this).addClass("floating");
  },
  function () {
    $(this).removeClass("floating");
  }
);
document.addEventListener('DOMContentLoaded', function () {
  var imgMain = document.getElementById("img-main");
  var smallImg = document.getElementsByClassName("small-img");
      
  for (var i = 0; i < smallImg.length; i++) {
      smallImg[i].addEventListener('click', function() {
          imgMain.src = this.src;
      });
  }
});

document.addEventListener('DOMContentLoaded', function() {
  window.addEventListener('resize', function() {
      var contents = document.querySelectorAll('.content');
  
      contents.forEach(function(content) {
          if (window.innerWidth <= 768) {
              content.classList.add('container-fluid');
          } else {
              content.classList.remove('container-fluid');
          }
      });
  }); 
  window.addEventListener('resize', function() {
      const ressub= document.querySelector("#ressub");
      if (window.innerWidth < 768 && submenu.classList.contains('disable')) {
          ressub.style.display = 'none';
      } 
  });
  
  window.dispatchEvent(new Event('resize'));
  
  //toggleforwrap
  const backhelp = document.querySelector('.backhelp');
  const submenu = document.querySelector('.submenu');
  const setting_drop = document.querySelector('.settingmenu');
  const setting_item = document.querySelector('.settingitem') ;
  const help_drop = document.querySelector('.helpmenu');
  const help_item = document.querySelector('.helpitem');
  const backset = document.querySelector('.backset')
  //Foward to setting
  setting_item.onclick = (()=>{
      setting_drop.style.marginLeft = '-320px';
      setting_drop.style.display = 'block';
  });
  //back from setting to menu
  backset.onclick = (()=>{
      setting_drop.style.marginLeft = '320px';
      setting_drop.style.display = 'none';
  });
  //foward to help
  help_item.onclick = (()=>{
      help_drop.style.marginLeft = '-320px';
      help_drop.style.display = 'block';
      submenu.classList.add('disable');
  });
  //back from help to menu
  backhelp.onclick = (()=>{
      help_drop.style.marginLeft = '320px';
      help_drop.style.display = 'none'; 
      submenu.classList.remove('disable');
  });

  //Responsive toggleforwrap
  const backhelp1 = document.querySelector('.backhelp1');
  const submenu1 = document.querySelector('.submenu1');
  const setting_drop1 = document.querySelector('.settingmenu1');
  const setting_item1 = document.querySelector('.settingitem1') ;
  const help_drop1 = document.querySelector('.helpmenu1');
  const help_item1 = document.querySelector('.helpitem1');
  const backset1 = document.querySelector('.backset1')
  //Responsive Foward to setting
  setting_item1.onclick = (()=>{
      setting_drop1.style.marginLeft = '-320px';
      setting_drop1.style.display = 'block';
  });
  //Responsive back from setting to menu
  backset1.onclick = (()=>{
      setting_drop1.style.marginLeft = '320px';
      setting_drop1.style.display = 'none';
  });
  //Responsive foward to help
  help_item1.onclick = (()=>{
      help_drop1.style.marginLeft = '-320px';
      help_drop1.style.display = 'block';
      submenu1.classList.add('disable');
  });
  //Responsive back from help to menu
  backhelp1.onclick = (()=>{
      help_drop1.style.marginLeft = '320px';
      help_drop1.style.display = 'none'; 
      submenu1.classList.remove('disable');
  });



  //toggleforreport
  const reportprob1 = document.querySelector('.reportprob1');
  const reportprob = document.querySelector('.reportprob');
  const rp = document.querySelector('.reportform');
  const bg = document.querySelector('.background');
  const close = document.querySelectorAll('.close');
  const improveform = document.querySelector('.improveform')
  const improve = document.querySelector('.improve');
  const probform = document.querySelector('.problemform');
  const prob = document.querySelector('.prob');
  const rpmenu = document.querySelector('.rpmenu');
  const backrprob = document.querySelector('.backprob');
  const backimprove = document.querySelector('.backimprove');

  //Open report menu
  reportprob.onclick = (()=>{
      rp.style.display ='flex';
      bg.style.display = 'block';
  });
  //Open report menu(responsive)
  reportprob1.onclick = (()=>{
      rp.style.display ='flex';
      bg.style.display = 'block';
  });
  //close rp menu
  close.forEach(close => {
      close.onclick = ()=>
      {
          rp.style.display = 'none';
          bg.style.display = 'none';
      };
  });
  //open improverp
  improve.onclick = (()=>{
      rpmenu.marginLeft = '-540px';
      improveform.style.display = 'block';
      rpmenu.style.display ='none';
  });
  prob.onclick = (() =>{
      rpmenu.marginLeft = '-540px';
      probform.style.display = 'block';
      rpmenu.style.display ='none';
  });
  //back rp menu
  backrprob.onclick = (() =>{
      rpmenu.marginLeft = '540px';
      probform.style.display = 'none';
      rpmenu.style.display ='block';  
  });
  backimprove.onclick = (()=>{
      rpmenu.marginLeft = '540px';
      improveform.style.display = 'none';
      rpmenu.style.display ='block';
  });
});
//togglemenu function
function togglemenu() {
  var submenu = document.getElementById("submenu");
  submenu.classList.toggle("openmenu");

}  

