<?php $this->layout('layouts/main', ['cssLink'=>'/css/contact.css','title' => 'Liên hệ']) ?>


<div class="contact-container">
    <div class="contact-info">
        <div class="contact-detail">
            <img src="/imgs/logo.png" alt="logo">
            <div class="brand"><b>Quán cà phê Den Coffee</b></div>
            <div class="address">P.Nguyễn Trác ,Yên nghĩa, Hà Đông, Hà Nội</div>
            <div class="time-info">Mở cửa: 6h00 - Đóng cửa: 23h00 tất cả các ngày trong tuần</div>
            <ul class="contact-icons">
                <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.039313450939!2d105.77247841477826!3d20.988870335423142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134558b71a5dd47%3A0x499ae1ec08c853e3!2sP.%20Nguy%E1%BB%85n%20Tr%C3%A1c%2C%20Y%C3%AAn%20Ngh%C4%A9a%2C%20H%C3%A0%20%C4%90%C3%B4ng%2C%20H%C3%A0%20N%E1%BB%99i%2C%20Vi%E1%BB%87t%20Nam!5e0!3m2!1sen!2s!4v1644562291259!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div class="contact-form">
        <h3>Góp ý của bạn</h3>
        <form action="/lienhe" method="post">
            <span>Chúng tôi sẽ tiếp thu tất cả các ý kiến của các bạn để nâng cao chất lượng phục vụ của quán</span>
           
            <div class="input-grp">
                <div>
                    <label for="email">Email: </label>
                    <input data-type="email" type="text" name="email" id="email" placeholder="Nhập email">
                </div>
                <span class="field-mess">Vui lòng nhập đúng định dạng email!</span>
            </div>

            <div class="input-grp">
               <div>
                    <label for="content">Nội dung: </label>
                    <textarea placeholder="Nội dung góp ý" data-type="content" name="content" id="content" cols="30" rows="10"></textarea>
               </div>
               <span class="field-mess">Nội dung phải dài hơn 10 ký tự!</span>
            </div>
            
            <input name="submit" type="submit" value="Gửi" name="submit" id="contact-sumit">
        </form>
    </div>
    
</div>

<?php $this->push('scripts') ?>
<script>

    $(document).ready(()=>{

        var form = $('.contact-form form')
        form.find('input[type=submit]').click((e)=>{
            if(validation(form)) form.submit()
            else e.preventDefault()
        })

        focusInputHandel()
    })
    
    
</script>
<?php $this->end() ?>