<?php

use Illuminate\Support\Facades\Auth;

$user = Auth::user();

if (empty($user)) {
?>
	<div class="auth-links">
		<ul>
			<li>
				<a href="/auth/login" class="nav-link">Login</a>
			</li>
			<li>
				<a href="/auth/register" class="nav-link">Register</a>
			</li>
		</ul>
	</div>
<?php
} else {
?>
	<div class="profile">
		<button class="profile-btn" aria-expanded='false' aria-controls="list">
			Профиль ({{ $user['username'] }})
			<svg class='svg-btn' height="32" viewBox="0 0 48 48" width="32" xmlns="http://www.w3.org/2000/svg">
				<path class='path-btn' d="M14 20l10 10 10-10z" fill='currentColor' />
			</svg>
		</button>

		<ul class="profile-list" id='list' aria-hidden='true'>
			<li class="profile-item">
				<a href="/likes" class="profile-link" tabindex="-1">Понравившиеся</a>
			</li>
			<li class="profile-item">
				<a href="/orders" class="profile-link" tabindex="-1">Мои заказы</a>
			</li>
			<li class="profile-item">
				<a href="{{ route("auth.logout") }}" class="profile-link" tabindex="-1">Выйти</a>
			</li>
		</ul>
	</div>
<?php
}
?>