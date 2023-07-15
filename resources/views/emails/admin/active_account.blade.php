@component('mail::message')
# Xin Chào!
@if($data['password'])
System access password <a href="{{ route('home_page') }}" ><b>VDO</b></a> của bạn là <b>{{ $data['password'] }}</b>.<br>Vui lòng click vào button bên dưới để kích hoạt tài khoản. Sau đó thay đổi mật khẩu và cập nhật lại thông tin cá nhân.<br>Xin cảm ơn!
@else
This is the account activation email. Please click the button below to activate your account.<br>Thank you!
@endif
@component('mail::button', ['url' => route('active_account', ['token' => $data['token']])])
Active Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
