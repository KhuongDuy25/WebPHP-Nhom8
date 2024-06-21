var quantityOptionHandel = ()=>{
    $('.quantity .plus').click((e)=>{
        var number = $(e.currentTarget.parentElement.parentElement.firstElementChild)
        var num = parseInt(number.val())
        num++
        number.val(num)
        
        totalCalculation()
    })

    $('.quantity .minus').click((e)=>{
        var number = $(e.currentTarget.parentElement.parentElement.firstElementChild)
        var num = parseInt(number.val())
        if(num>1) {
            num--
            number.val(num)
        }

        totalCalculation()
    })

    $('.quantity .number').change((e)=>{
        var num = parseInt($(e.currentTarget).val())
        if(num<1) $(e.currentTarget).val(1)

        totalCalculation()
    })

}

var totalCalculation=()=>{
    var itemList=$('.maincart-list .maincart-list-item')
    if(itemList.length>0){
        var price
        var num
        var total=0
        itemList.each((i,e)=>{
            price=parseInt($(e).children('.maincart-list-item-price').children().last().text())
            num = parseInt($(e).children('.maincart-list-item-quantity').children('.quantity')
                            .children('.number').val())
            total += price*num
        })
    }

    var totalBfVoucherBox = $('.total-bf-voucher').children().last()
    var totalBox = $('.total').children().last()
    var voucherAppied = parseInt($('.voucher-applied').children().last().text())
    
    var pesudoVoucherAppied = $('.voucher-applied').children('.pesudoApplied')
    pesudoVoucherAppied.text(currencyFormatting(voucherAppied))
    
    totalBfVoucherBox.text(currencyFormatting(total))
    var finalToTal = total+voucherAppied
    if(finalToTal<0) finalToTal=0
    totalBox.text(currencyFormatting(finalToTal))
}

var currencyFormatting = (num) => {
    return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(num)
}

const regex={
    email: /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i,
    username: /^[a-zA-Z0-9_-]{8,20}$/,
    password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/,
    repassword: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/
}

var repasswordChecking = (form, repassInput) =>{
    let pass = $(form.find('input[type=password]')[0]).val()
    let repass = repassInput.val()
    return pass===repass
}

var focusInputHandel = () => {
    $('.input-grp input, .input-grp textarea').focus((e) => {
        $(e.currentTarget).parent().parent().find('.field-mess').hide()
    })

    $('.input-grp input, .input-grp textarea').focusout((e) => {
        let value = $(e.target).val()
        let type = $(e.target).data('type')
        var check = true
        if(type==='content') check = value.length>10 
        else {
            if (regex[type].test(value)) check=true
            else check = false

            if (type == 'repassword' && check) {
                if (repasswordChecking($('form'), $(e.target))) check = true
                else check = false
            }
        }

        if(check) $(e.target).removeClass('input-data-incorrect').addClass('input-data-correct')
        else $(e.target).addClass('input-data-incorrect').removeClass('input-data-correct')

    })
}


var validation = (form) => {
    
    var validationChecking = true
    var inputList = form.find('.input-grp input, .input-grp textarea')

    inputList.each((i,e)=>{
        let value = $(e).val()
        let type = $(e).data('type')
        var check
        
        if(type==='content') check = value.length>10 
        else {
            check = regex[type].test(value)
            if (type == "repassword") check = check && repasswordChecking(form, $(e))
        }
        
        validationChecking = validationChecking && check
        
        if(!check){
            $(e).parent().parent().find('.field-mess').show()
            $(e).addClass('input-data-incorrect').removeClass('input-data-correct')
        }
        else{
            $(e).parent().parent().find('.field-mess').hide()
            $(e).removeClass('input-data-incorrect').addClass('input-data-correct')
        }
    })

    return validationChecking
}

var slide = (slide, duration)=>{
    var slideList = slide.find('.slides-item')
    var slideContain = slide.find('.slide-container')

    var slideCallback=()=>{
        $(slideContain).animate({ left: '-='+slideList.outerWidth(true)+'px' },()=>{
            $(slideList[0]).appendTo(slideContain)
            $(slideContain).css('left',0)
            slideList = slide.find('.slides-item')
        })
    }

    var interval = setInterval(slideCallback, duration)

    $('.slide-next-btn').click(()=>{
        $(slideContain).animate({ left: '-='+slideList.outerWidth(true)+'px' },()=>{
            $(slideList[0]).appendTo(slideContain)
            $(slideContain).css('left',0)
            slideList = slide.find('.slides-item')
            clearInterval(interval)
            interval = setInterval(slideCallback, duration)
        })
    })

    $('.slide-previous-btn').click(()=>{
        $(slideContain).css('left',-slideList.outerWidth(true))
        $(slideList[slideList.length-1]).prependTo(slideContain)
        $(slideContain).animate({ left: '+='+slideList.outerWidth(true)+'px' },()=>{
            $(slideContain).css('left',0)
            slideList = slide.find('.slides-item')
            clearInterval(interval)
            interval = setInterval(slideCallback, duration)
        })
    })
}

var quantityShowHandle = ( quantityBox, fix, duration)=>{
    var quantityBoxTop = quantityBox.offset().top - fix
    var scrollToQuantityFlag = false
    window.onscroll = (e) => {
        if (window.scrollY > quantityBoxTop && !scrollToQuantityFlag) {
            scrollToQuantityFlag = true
            $('.quantity-value-hide').each((i, e) => {

                var realValueBox = $(e).parent().children().first()
                var value = realValueBox.text()

                var interval = setInterval(() => {
                    realValueBox.text(++value)
                    if (value == $(e).text()) clearInterval(interval)
                }, duration)
            })
        }
    }
}

