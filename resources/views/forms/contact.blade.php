{{
  Form::open([
    'url' => route('f.contact'),
    'method' => 'post',
    'class' => 'contact__form',
    'id' => 'contact-form',
    'data-form-validate' => '',
  ])
}}
{{ Form::hidden('form_id', '1') }}
<!-- <form class="contact__form" id="contact-form" action="http://httpbin.org/post" method="POST" data-form-validate> -->
  <div class="form-group">
    <select name="who-you-are" data-choices data-class-names-container-outer="choices choices_no-border" data-rules="required">
      <option value="" selected disabled>WHO ARE YOU</option>
      <option value="producer">Producer</option>
      <option value="financier">Financier</option>
      <option value="distributor">Distributor</option>
      <option value="other">Other</option>
    </select>
  </div>
  <div class="form-group">
    <input class="form-control" placeholder="NAME" id="name" name="name" data-rules="required">
  </div>
  <div class="form-group">
    <input class="form-control" placeholder="EMAIL" id="email" name="email" data-rules="required|valid_email">
  </div>
  <div class="form-group">
    <textarea class="form-control" rows="7" id="message" name="message" data-rules="required" placeholder="MESSAGE"></textarea>
  </div>
  <div class="text-center">
    <button class="btn btn_primary"><i class="fa fa-paper-plane mr-10"></i> Send Message</button>
  </div>
</form>
<!-- NEW
<form class="contact__form" id="contact-form" action="http://httpbin.org/post" method="POST" data-form-validate>
    <div class="form-group">
      <select name="who-you-are" data-choices data-class-names-container-outer="choices choices_no-border" data-rules="required">
        <option value="" selected disabled>WHO ARE YOU</option>
        <option value="producer">Producer</option>
        <option value="financier">Financier</option>
        <option value="distributor">Distributor</option>
        <option value="other">Other</option>
      </select>
    </div>
    <div class="form-group">
      <input class="form-control" placeholder="NAME" name="name" data-rules="required">
    </div>
    <div class="form-group">
      <input class="form-control" placeholder="EMAIL" name="email" data-rules="required|valid_email">
    </div>
    <div class="form-group">
      <textarea class="form-control" placeholder="MESSAGE" rows="7" name="message" data-rules="required"></textarea>
    </div>
    <div class="text-center">
      <button class="btn btn_primary"><i class="fa fa-paper-plane mr-10"></i>Send Message</button>
    </div>
  </form> -->
