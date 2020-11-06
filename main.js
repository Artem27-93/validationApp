//приветствие, выбор регистрация/авторизация на странице
$('#log').click(function(){
    $('#loginForm').fadeToggle();

})
$('#reg').click(function(){
    $('#regForm').fadeToggle();

})



//подключение табов на главной странице
let tab; // заголовок вкладки
const tabContent = document.getElementsByClassName('tabContent'), // блок содержащий контент вкладки
        comp = document.querySelectorAll('.component'),
        content = document.getElementById('content'),
        profile = document.getElementById('profile');


$(function() {  //
    tab=$('.tab');
    hideTabsContent(1);
})

$('#tabs').click(function (event) {
    let target = event.target;
    if (target.className=='tab') {
       for (let i=0; i<tab.length; i++) {
           if (target == tab[i]) {
               showTabsContent(i);
               break;
           }
       }
    }
})

function hideTabsContent(a){
    for (let i=a; i<tabContent.length; i++) {
        tabContent[i].classList.remove('show');
        tabContent[i].classList.add("hide");
        tab[i].classList.remove('whiteborder');
    }
}

function showTabsContent(b){
    if (tabContent[b].classList.contains('hide')) {
        hideTabsContent(0);
        tab[b].classList.add('whiteborder');
        tabContent[b].classList.remove('hide');
        tabContent[b].classList.add('show');
    }
}

// Запрос на сервер, для отображения количества заявок выбранной категории в очереди
$.getJSON('getData.php',function(data){
	$('.span')[0].append();
	$('.span')[1].append();
	$('.span')[2].append();


for(let i=0; i<=comp.length;i++){
	for(let j=0; j<=data.length;j++){
		if($('.category')[i].innerText === data[j].Category){
			$('.span')[i].append(data[j].count);
		}else{
			
		}
	}
}
});

// функция для сокрытия отображения категорий на странице
function hideComponent(content,profile){
    content.style.display = 'none';
    profile.style.display = 'block';

}
// по нажатию на кнопку START отображаем выбраную категорию с фото и вопросы анкеты и меняем в зависимости от корректного ответа класс
    $('.btn').click(function(){
        hideComponent(content,profile);
        $.getJSON('getTicket.php',function(data){
            data.forEach((item,index)=>{
                console.log(item.Question);
                $($('.question')[index]).append(item.Question);
                 $($('.question')[index]).addClass(item.id);
                $('#image').attr("src", item.Path2File);
                 if(item.CorrectVariant==0){
                  $($('.question').siblings('.check_yes')[index]).removeClass('check_yes').addClass('yes'); 
                  $($('.question').siblings('.check_no')[index]).removeClass('check_no').addClass('check_yes'); 
                  $($('.question').siblings('.yes')[index]).removeClass('yes').addClass('check_yes'); 
                }
            })
        })
    })

// выбор чекбоксов с правильным ответом
$('#btnNext').on('click', function () {
	var resultval='Y';
	var num;
	$('.check_no').each(function () {		
		if ($(this).prop('checked') ) {
			resultval = 'N';
		}
		
	});
	num = $($('.question')[0]).attr('class').split(' ')[1];
	if(resultval=='Y'){
		alert('Положительно');
	}else{
		alert('Негативно');
	}
	$.getJSON('updateResult.php', {
		res: resultval,
		id: num
	},function(data){
	 setTimeout(function () {
        location.reload();
    }, 1000);
		
	});
});


// $('.checks').on('change', function () {
//     if ( $('.check_yes').prop('checked') ) {
//         $('#btnNext').attr('disabled', false);

//     } else {
//         $('#btnNext').attr('disabled', true);
//     }
// });






