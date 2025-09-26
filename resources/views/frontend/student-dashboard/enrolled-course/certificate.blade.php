<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificate</title>
  <style>
    @media print {
      .certificate-container {
        visibility: hidden;
      }

      .certificate-preview {
        visibility: visible;
      }

      * {
        print-color-adjust: exact
      }
    }

    .certificate-container {
      width: 100%;
    }

    .certificate-preview {
      width: 1122.52px;
      height: 793.70px;
      position: relative;
      background: #fff;
      margin: 0 auto;
      overflow: hidden;
      transform-origin: top center;
      transition: transform 0.2s ease-in-out;
      -webkit-transform-origin: left top;
    }

    .certificate-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-image: url({{ asset($certificate->background) }})
    }

    .grid-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 1;
      background-image:
        linear-gradient(to right, rgba(0, 0, 0, 0.1) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(0, 0, 0, 0.1) 1px, transparent 1px);
      background-size: 20px 20px;
    }

    .draggable-text {
      position: absolute;
    }

    .draggable-signature {
      position: absolute;
      padding: 5px;
    }

    .title-text .text-content {
      font-size: 24px;
      font-weight: bold;
      font-family: 'Times New Roman', serif;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .subtitle-text .text-content {
      font-size: 36px;
      font-weight: normal;
      font-family: 'Times New Roman', serif;
    }

    .description-text .text-content {
      font-size: 16px;
      font-weight: normal;
      font-family: Arial, sans-serif;
      max-width: 600px;
      line-height: 1.4;
    }

    .grid-overlay.hidden {
      display: none;
    }
  </style>
</head>

<body>
  <div class="certificate-container">
    <div class="certificate-preview" id="certificate-preview">
      <!-- Certificate background -->
      <div class="certificate-bg" id="certificate-bg"></div>

      <!-- Draggable elements -->
      <div
        class="draggable-text title-text"
        id="draggable-title"
        style="top: {{ $certificate?->title_y}}px; left: {{ $certificate?->title_x}}px;"
      >
        <span class="text-content" style="color: {{ $certificate?->title_color ?? '#000000' }}">
          {{ $certificate?->title ?? 'Certificate Title' }}
        </span>
      </div>

      <div
        class="draggable-text subtitle-text"
        id="draggable-subtitle"
        style="top: {{ $certificate?->subtitle_y}}px; left: {{ $certificate?->subtitle_x}}px;"
      >
        <span class="text-content" style="color: {{ $certificate?->subtitle_color ?? '#666666' }}">
          {{ $certificate?->sub_title ?? 'Certificate Subtitle' }}
        </span>
      </div>

      <div
        class="draggable-text description-text"
        id="draggable-description"
        style="top: {{ $certificate?->description_y}}px; left: {{ $certificate?->description_x}}px;"
      >
        <span class="text-content"
          style="color: {{ $certificate?->description_color ?? '#333333' }}"
        >
          {{ $certificate?->description ?? 'Certificate Description' }}
        </span>
      </div>

      <div
        class="draggable-signature"
        id="draggable-signature"
        style="bottom: {{ $certificate?->signature_y ?? 100 }}px; right: {{ $certificate?->signature_x}}px;"
      >
        <img
          src="{{ asset($certificate->signature) }}"
          alt="Signature"
          style="max-width: 150px; max-height: 80px; {{ $certificate?->signature ? '' : 'display: none;' }}"
        >
      </div>
    </div>
  </div>
</body>

</html>
