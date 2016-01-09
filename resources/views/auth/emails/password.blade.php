点此处重置密码: {{ url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}
