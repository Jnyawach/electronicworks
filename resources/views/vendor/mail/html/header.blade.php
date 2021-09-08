<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
        <a target="_blank" style="-webkit-text-size-adjust: none;-ms-text-size-adjust: none;mso-line-height-rule: exactly;text-decoration: underline;color: #1376c8;font-size: 14px;"><img src="https://lmmvos.stripocdn.email/content/guids/CABINET_dfd0b21d3a8c9782ac61695664f2adaa/images/93691630698565361.png" alt="Logo" style="display: block;font-size: 12px;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" width="110" title="Logo"></a>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
