
@section('title', 'Contact')
@section('description', 'Feel free to contact me using the form below')

@push('foot-scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        let isCaptchaValidated = false;
        let form = document.getElementById("contact-form");

        function onCaptchaValidated() {
            isCaptchaValidated = true;
            form.submit();
        }

        form.addEventListener("submit", function (event) {
            if (!isCaptchaValidated) {
                event.preventDefault();
                grecaptcha.execute();
            }
        });
    </script>
@endpush

<x-app-layout>
  <x-page-container>
    @if ($errors->any())
    <div class="bg-yellow-200 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-5" role="alert">
      <p class="font-bold">Errors...</p>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <x-page-title title="Contact me" subtitle="Do you have a question? Get in touch. Use the form below to send me a message" />
    <form method="POST" action="/contact" id="contact-form">
      @csrf
      <!-- Captcha -->
      <div class="g-recaptcha"
            data-sitekey="{{$sitekey}}"
            data-callback="onCaptchaValidated"
            data-size="invisible">
      </div>

      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <!--Contact grid-->
        <div class="grid grid-cols-2 gap-y-2 gap-x-4">
          <div class="col-span-2 sm:col-span-1">
            <div class="form-control">
              <x-label for="name" :value="__('Name')" />
              <x-input name="name" type="text" class="input-bordered" placeholder="" required></x-input>
            </div>
          </div>
          <div class="col-span-2 sm:col-span-1">
            <div class="form-control">
              <x-label for="email" :value="__('Email')" />
              <x-input name="email" type="email" class="input-bordered" placeholder="" required></x-input>
            </div>
          </div>

          <div class="col-span-2">
            <div class="form-control">
                <x-label for="message" :value="__('Your Message')" />
                <textarea name="message" class="textarea textarea-bordered h-24" placeholder=""></textarea>
            </div>
          </div>
          <div class="col-span-2 mt-8">
            <x-button type="submit" class="btn-primary btn-block">Send</x-button>
          </div>

        </div>
      </div>
    </form>
  </x-page-container>
</x-app-layout>
