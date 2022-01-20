function calculatorBMR(){
    var weight = document.getElementById("weight").value;
    var height = document.getElementById("height").value;
    var age = document.getElementById("age").value;

    var Weight = parseInt(weight);
    var Height = parseInt(height);
    var Age = parseInt(age);

return ((10*Weight)+(6.25*Height)-(5*Age));

}



function chooseSex(){
    var female =  document.getElementById("female");
    var male = document.getElementById("male");

    var Female = parseFloat(female.value);
    var Male = parseFloat(male.value);

    if(female.checked === true){
        return calculatorBMR() - Female;
    } else if (male.checked === true){
        return calculatorBMR() + Male;
    } else {
        return "You need to choose the sex";
    }
}


function chooseActivity(){

    
    for(var i = 0; i < document.activityChecked.activity.length; i++){
        if(document.activityChecked.activity[i].checked){
        var activityResult = document.activityChecked.activity[i].value;

        return activityResult;

        }
}
}


function chooseGoal(){
    var looseWeight = document.getElementById("looseWeight");
    var gainWeight = document.getElementById("gainWeight");

    var LooseWeight = parseFloat(looseWeight.value);
    var GainWeight = parseFloat(gainWeight.value);

    if(looseWeight.checked === true){
        return chooseSex() - LooseWeight;
    } else if (gainWeight.checked === true){
        return chooseSex() + GainWeight;
    } else {
        return "You need to choose your goal";
    }
}


function caloricGoal(){
return Math.floor(((chooseActivity() * chooseSex())/100) + chooseGoal());
}


function protein(){
    var weight = document.getElementById("weight").value;

    return weight * 2;

}

function fat(){
    var calories = caloricGoal();

    return Math.floor(((calories/100)*25)/9);
}

function carbs(){
    var calories = caloricGoal();
    var proteinCalories = protein() * 4;
    var fatCalories = fat() * 9;

    return Math.floor((calories-(proteinCalories + fatCalories))/4);
}

function macros(){
    return document.getElementById("result").innerHTML= "<ul><li> CALORIES " +  caloricGoal() + "kcal</li><br>" + " <li> PROTEIN " + protein() + "g</li><br>" + " <li> FAT " + fat() + "g</li><br>" + " <li> CARBOHYDRATES " + carbs() +"g</li></ul>";
    }


