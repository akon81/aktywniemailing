<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('email.welcome_subject') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Sora', ui-sans-serif, system-ui, sans-serif;
            background-color: #F7F6F3;
            color: #2D2D2D;
            -webkit-font-smoothing: antialiased;
        }

        .wrapper {
            max-width: 560px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 2px;
            overflow: hidden;
            border: 1px solid #D4C5BC;
        }

        /* ── Header ── */
        .header {
            position: relative;
            background: linear-gradient(135deg, #1c1917 0%, #292524 50%, #1c1917 100%);
            padding: 48px 40px 44px;
            text-align: center;
            overflow: hidden;
        }

        .header-lines {
            position: absolute;
            inset: 0;
            opacity: 0.05;
            background-image: repeating-linear-gradient(45deg, #c9a84c 0, #c9a84c 1px, transparent 0, transparent 50%);
            background-size: 20px 20px;
        }

        .header-inner { position: relative; }

        .header-label {
            font-family: 'IBM Plex Mono', ui-monospace, monospace;
            color: #9D7B6F;
            font-size: 11px;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .header-title {
            color: #F7F6F3;
            font-size: 30px;
            line-height: 1.2;
            font-weight: 400;
            letter-spacing: -0.02em;
        }

        .header-title em {
            color: #B8A99A;
            font-style: italic;
        }

        .header-divider {
            width: 40px;
            height: 1px;
            background: #9D7B6F;
            margin: 24px auto 0;
            opacity: 0.6;
        }

        /* ── Body ── */
        .body {
            padding: 40px 40px 36px;
        }

        .greeting {
            font-size: 18px;
            font-weight: 500;
            color: #2D2D2D;
            margin-bottom: 20px;
        }

        .text {
            font-size: 15px;
            line-height: 1.75;
            color: #6B7280;
            margin-bottom: 16px;
        }

        /* ── Highlight box ── */
        .highlight-box {
            background: #EFEBE7;
            border-left: 3px solid #9D7B6F;
            padding: 20px 24px;
            border-radius: 0 2px 2px 0;
            margin: 28px 0;
        }

        .highlight-label {
            font-family: 'IBM Plex Mono', ui-monospace, monospace;
            font-size: 11px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #9D7B6F;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .highlight-box p {
            font-size: 14px;
            line-height: 1.75;
            color: #6B7280;
        }

        /* ── What to expect list ── */
        .expect-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .expect-list li {
            font-size: 14px;
            line-height: 1.6;
            color: #6B7280;
            padding: 6px 0;
            border-bottom: 1px solid #EFEBE7;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .expect-list li:last-child { border-bottom: none; }

        .expect-list li::before {
            content: '✓';
            color: #9D7B6F;
            font-size: 13px;
            font-weight: 600;
            flex-shrink: 0;
            margin-top: 1px;
        }

        /* ── Signature ── */
        .signature {
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #EFEBE7;
        }

        .signature .sign-off {
            font-size: 14px;
            color: #9CA3AF;
            margin-bottom: 6px;
        }

        .signature .name {
            font-size: 18px;
            font-weight: 400;
            color: #2D2D2D;
            font-style: italic;
        }

        /* ── Footer ── */
        .footer {
            background: #2D2D2D;
            padding: 24px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .footer-lines {
            position: absolute;
            inset: 0;
            opacity: 0.04;
            background-image: repeating-linear-gradient(45deg, #c9a84c 0, #c9a84c 1px, transparent 0, transparent 50%);
            background-size: 20px 20px;
        }

        .footer-inner { position: relative; }

        .footer p {
            font-size: 11px;
            color: #9CA3AF;
            line-height: 1.7;
            font-family: 'IBM Plex Mono', ui-monospace, monospace;
        }

        .footer .brand {
            font-size: 13px;
            color: #B8A99A;
            margin-bottom: 8px;
            font-family: 'Sora', ui-sans-serif, system-ui, sans-serif;
            font-weight: 400;
        }
    </style>
</head>
<body>
    <div class="wrapper">

        {{-- Header --}}
        <div class="header">
            <div class="header-lines"></div>
            <div class="header-inner">
                <p class="header-label">{{ __('email.header_label') }}</p>
                <h1 class="header-title">{{ __('email.header_title_line1') }}<br><em>{{ __('email.header_title_em') }}</em></h1>
                <div class="header-divider"></div>
            </div>
        </div>

        {{-- Body --}}
        <div class="body">
            <p class="greeting">{{ $subscriber->name }},</p>

            <p class="text">{{ __('email.intro_1') }}</p>

            <p class="text">
                {{ __('email.intro_2') }}
                <ul class="expect-list">
                    <li>{{ __('email.expect_item_1') }}</li>
                    <li>{{ __('email.expect_item_2') }}</li>
                    <li>{{ __('email.expect_item_3') }}</li>
                </ul>
            </p>

            <div class="highlight-box">
                <p class="highlight-label">{{ __('email.highlight_label') }}</p>
                <ul class="expect-list">
                    <li>{{ __('email.highlight_item_1') }}</li>
                    <li>{{ __('email.highlight_item_2') }}</li>
                    <li>{{ __('email.highlight_item_3') }}</li>
                    <li>{{ __('email.highlight_item_4') }}</li>
                </ul>
            </div>

            <p class="text">{{ __('email.outro') }}</p>

            <div class="signature">
                <p class="sign-off">{{ __('email.sign_off') }}</p>
                <p class="name">Klaudia | Aktywnie dla siebie</p>
            </div>
        </div>

        {{-- Footer --}}
        <div class="footer">
            <div class="footer-lines"></div>
            <div class="footer-inner">
                <p class="brand">{{ __('email.header_label') }}</p>
                <p>{{ __('email.footer_received') }}</p>
                <p style="margin-top: 10px;">
                    <a href="{{ URL::signedRoute('unsubscribe', ['email' => $subscriber->email]) }}"
                       style="color: #9D7B6F; text-decoration: underline; font-family: 'IBM Plex Mono', ui-monospace, monospace; font-size: 11px; letter-spacing: 0.1em;">
                        {{ __('email.footer_unsubscribe') }}
                    </a>
                </p>
                <p style="margin-top: 8px;">{{ __('email.footer_copyright', ['year' => date('Y')]) }}</p>
            </div>
        </div>

    </div>
</body>
</html>
