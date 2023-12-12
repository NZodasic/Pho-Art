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

    //toggleforreport
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
