<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body class="body" style="margin: 0; padding: 0; font-family: Helvetica,Verdana,Arial,sans-serif; font-size: 11pt; color: #777777; line-height: 1.5em; width: 100%; min-width: 600px;">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#E3E3E3" align="center" style="padding: 0; margin: 0; border-collapse: collapse;">
        <tbody>
            <tr>
                <td style="border-collapse: collapse;" width="100%" align="center">
                    <table border="0" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff" style="padding: 0; border-collapse: collapse; margin: auto;">
                        <tbody>
                            @include('emails.layouts.partials._preheader')
                            @include('emails.layouts.partials._header')

                            @include('emails.layouts.partials._1col')

                            @include('emails.layouts.partials._footer')
                            @include('emails.layouts.partials._signature')
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
