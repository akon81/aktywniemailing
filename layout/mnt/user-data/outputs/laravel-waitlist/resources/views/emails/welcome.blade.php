<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witaj na liście!</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Georgia, 'Times New Roman', serif; background: #faf9f7; color: #44403c; }
        .wrapper { max-width: 560px; margin: 40px auto; background: #ffffff; border-radius: 16px; overflow: hidden; border: 1px solid #e7e5e4; }
        .header { background: linear-gradient(135deg, #1c1917 0%, #292524 100%); padding: 48px 40px; text-align: center; }
        .header-label { color: #c9a84c; font-size: 11px; letter-spacing: 4px; text-transform: uppercase; margin-bottom: 16px; font-family: 'Helvetica Neue', sans-serif; }
        .header-title { color: #faf9f7; font-size: 28px; line-height: 1.3; font-weight: 400; }
        .header-title em { color: #c9a84c; font-style: italic; }
        .ornament { text-align: center; padding: 24px; color: #c9a84c; font-size: 20px; }
        .body { padding: 8px 40px 40px; }
        .greeting { font-size: 18px; color: #1c1917; margin-bottom: 20px; }
        .text { font-size: 15px; line-height: 1.8; color: #57534e; margin-bottom: 16px; }
        .highlight-box { background: #fdf8ee; border-left: 3px solid #c9a84c; padding: 20px 24px; border-radius: 0 12px 12px 0; margin: 28px 0; }
        .highlight-box p { font-size: 14px; line-height: 1.7; color: #78716c; }
        .highlight-box strong { color: #1c1917; font-family: 'Helvetica Neue', sans-serif; }
        .footer { background: #faf9f7; padding: 28px 40px; border-top: 1px solid #e7e5e4; text-align: center; }
        .footer p { font-size: 12px; color: #a8a29e; line-height: 1.6; font-family: 'Helvetica Neue', sans-serif; }
        .signature { margin-top: 28px; padding-top: 24px; border-top: 1px solid #f5f5f4; }
        .signature p { font-size: 14px; color: #78716c; margin-bottom: 4px; }
        .signature .name { font-size: 18px; color: #1c1917; font-style: italic; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <p class="header-label">Strefa Premium</p>
            <h1 class="header-title">Twoje miejsce jest<br><em>zarezerwowane</em></h1>
        </div>

        <div class="ornament">— ✦ —</div>

        <div class="body">
            <p class="greeting">Droga {{ $subscriber->name }},</p>

            <p class="text">
                Cieszę się, że jesteś! Właśnie dołączyłaś do grona kobiet, które postanowiły
                zadbać o siebie — świadomie i na swoich zasadach.
            </p>

            <p class="text">
                Strefa Premium z ćwiczeniami video dla kobiet 40+ jest jeszcze w przygotowaniu,
                ale Ty już masz swoje miejsce na liście.
                Jako pierwsza dowiesz się o starcie i otrzymasz specjalną ofertę.
            </p>

            <div class="highlight-box">
                <p>
                    <strong>Co Cię czeka w Strefie Premium?</strong><br>
                    Ćwiczenia video dopasowane do ciała i potrzeb kobiety po 40. roku życia —
                    bez presji, bez pośpiechu, za to z realnym efektem i przyjemnością z ruchu.
                </p>
            </div>

            <p class="text">
                Do zobaczenia wkrótce!
            </p>

            <div class="signature">
                <p>Z poważaniem,</p>
                <p class="name">Zespół Strefy Premium</p>
            </div>
        </div>

        <div class="footer">
            <p>
                Otrzymałaś tę wiadomość, ponieważ zapisałaś się na listę oczekujących.<br>
                Jeśli to pomyłka, możesz zignorować tego maila.
            </p>
            <p style="margin-top: 8px;">© {{ date('Y') }} Strefa Premium · Wszystkie prawa zastrzeżone</p>
        </div>
    </div>
</body>
</html>
