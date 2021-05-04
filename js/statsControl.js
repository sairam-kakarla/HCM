
function calEff(res,reg){
    if(res==reg){
        return 100;
    }
    else{
        return Math.ceil(res*100/reg);
    }
}
$(document).ready(function(){
    $.ajax({
        url: 'actionStats.php',
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            
            document.getElementById("countReg").textContent=response.total.reg
            document.getElementById("countRes").textContent=response.total.res
            var cleaning=calEff(response.cleaning.res,response.cleaning.reg)
            console.log(cleaning)
            var electricity=calEff(response.electricity.res,response.electricity.reg)
            console.log(electricity)
            var wifi=calEff(response.wifi.res,response.wifi.reg)
            console.log(wifi)
            var washroom=calEff(response.washroom.res,response.washroom.reg)
            console.log(washroom)
            var mess=calEff(response.mess.res,response.mess.reg)
            console.log(mess)
            var architecture=calEff(response.architecture.res,response.architecture.reg)
            console.log(architecture)
            var others=calEff(response.others.res,response.others.reg)
            console.log(others)
            document.getElementById("cleaning").style.width=cleaning+"%"
            document.getElementById("electricity").style.width=electricity+"%"
            document.getElementById("wifi").style.width=wifi+"%"
            document.getElementById("washroom").style.width=washroom+"%"
            document.getElementById("mess").style.width=mess+"%"
            document.getElementById("architecture").style.width=architecture+"%"
            document.getElementById("others").style.width=others+"%"
        }
    });
});