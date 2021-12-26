function openCategory(evt, categoryName) {
    var i, tabContent, tabLinks;
    tabcontent = document.getElementsByClassName("tab-contents");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tab-btn");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(categoryName).style.display = "block";
    evt.currentTarget.className += " active";
}

function openCategory1(evt, categoryName1) {
    var i, tabContent1, tabLinks1;
    tabcontent1 = document.getElementsByClassName("tab-contents1");
    for (i = 0; i < tabcontent1.length; i++) {
        tabcontent1[i].style.display = "none";
    }
    tablinks1 = document.getElementsByClassName("tab-btn1");
    for (i = 0; i < tablinks1.length; i++) {
        tablinks1[i].className = tablinks1[i].className.replace(" active1", "");
    }
    document.getElementById(categoryName1).style.display = "block";
    evt.currentTarget.className += " active1";
}