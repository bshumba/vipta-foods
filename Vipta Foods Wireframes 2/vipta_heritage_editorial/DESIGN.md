---
name: Vipta Heritage Editorial
colors:
  surface: '#f8faf3'
  surface-dim: '#d8dbd4'
  surface-bright: '#f8faf3'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f2f4ed'
  surface-container: '#ecefe8'
  surface-container-high: '#e6e9e2'
  surface-container-highest: '#e1e3dc'
  on-surface: '#191d18'
  on-surface-variant: '#414940'
  inverse-surface: '#2e312d'
  inverse-on-surface: '#eff2eb'
  outline: '#71796f'
  outline-variant: '#c0c9bd'
  surface-tint: '#2e6a3a'
  primary: '#145225'
  on-primary: '#ffffff'
  primary-container: '#2f6b3b'
  on-primary-container: '#a8e9ad'
  inverse-primary: '#96d69b'
  secondary: '#306a31'
  on-secondary: '#ffffff'
  secondary-container: '#b2f3ab'
  on-secondary-container: '#377137'
  tertiary: '#5a4400'
  on-tertiary: '#ffffff'
  tertiary-container: '#775b00'
  on-tertiary-container: '#fdd573'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#b1f2b5'
  primary-fixed-dim: '#96d69b'
  on-primary-fixed: '#002109'
  on-primary-fixed-variant: '#135225'
  secondary-fixed: '#b2f3ab'
  secondary-fixed-dim: '#97d691'
  on-secondary-fixed: '#002204'
  on-secondary-fixed-variant: '#16521c'
  tertiary-fixed: '#ffdf96'
  tertiary-fixed-dim: '#e9c262'
  on-tertiary-fixed: '#251a00'
  on-tertiary-fixed-variant: '#5a4400'
  background: '#f8faf3'
  on-background: '#191d18'
  surface-variant: '#e1e3dc'
typography:
  display-lg:
    fontFamily: Playfair Display
    fontSize: 64px
    fontWeight: '700'
    lineHeight: 72px
    letterSpacing: -0.02em
  display-lg-mobile:
    fontFamily: Playfair Display
    fontSize: 40px
    fontWeight: '700'
    lineHeight: 48px
    letterSpacing: -0.01em
  headline-lg:
    fontFamily: Playfair Display
    fontSize: 40px
    fontWeight: '600'
    lineHeight: 48px
  headline-lg-mobile:
    fontFamily: Playfair Display
    fontSize: 32px
    fontWeight: '600'
    lineHeight: 38px
  headline-md:
    fontFamily: Playfair Display
    fontSize: 28px
    fontWeight: '500'
    lineHeight: 36px
  body-lg:
    fontFamily: Hanken Grotesk
    fontSize: 18px
    fontWeight: '400'
    lineHeight: 28px
  body-md:
    fontFamily: Hanken Grotesk
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  label-caps:
    fontFamily: Hanken Grotesk
    fontSize: 12px
    fontWeight: '700'
    lineHeight: 16px
    letterSpacing: 0.1em
  quote:
    fontFamily: Playfair Display
    fontSize: 24px
    fontWeight: '400'
    lineHeight: 34px
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  unit: 8px
  container-max: 1280px
  gutter: 24px
  margin-desktop: 64px
  margin-mobile: 20px
  stack-lg: 80px
  stack-md: 48px
---

## Brand & Style

The design system is built upon the intersection of Zimbabwean agricultural heritage and cutting-edge nutritional science. It evokes the feeling of a premium editorial magazine—spacious, authoritative, and sophisticated. The brand personality is "The Modern Alchemist": someone who respects the earth’s raw ingredients but refines them through scientific precision.

The visual style is **High-End Editorial Minimalism** with a **Tactile** edge. It mimics the layout of a luxury health and wellness publication, utilizing high-contrast typography and vast "breathing room" to signify premium positioning. While the core is clean and digital-first, subtle shadows and warm color tones provide a grounded, organic feel that prevents the UI from feeling sterile.

## Colors

The palette is rooted in the lush flora of Zimbabwe, contrasted against warm, gallery-like neutrals. 

- **Primary Green (#2F6B3B):** Used for primary actions, brand headers, and deep scientific trust.
- **Secondary Green (#4F8A4D):** Used for supporting elements, success states, and subtle iconography.
- **Cream (#F8F5EC) & Warm White (#FFFFFF):** The primary background layers. Cream provides a paper-like, organic texture, while White is reserved for elevated cards or interactive inputs.
- **Light Sage (#F4F8F2):** Used for subtle section nesting and background alternates to maintain low-contrast sophistication.
- **Accent Gold (#C7A347):** Used sparingly as a "seal of quality"—reserved for badges, premium highlights, or tiny calligraphic details.
- **Dark Text (#2D2D2D):** A soft black that maintains high legibility without the harshness of pure black.

## Typography

This design system employs a classic high-contrast pairing. **Playfair Display** provides the editorial "voice"—dramatic, serif-heavy, and luxurious. It should be used for large headings and pull-quotes. **Hanken Grotesk** offers a sharp, contemporary sans-serif counterpart for body copy and technical data, ensuring that the "science" of the nutrition startup remains legible and professional.

For display text, utilize tighter letter-spacing to create a "compact-luxury" look. For labels and captions, use all-caps with generous letter-spacing to mimic high-end fashion branding.

## Layout & Spacing

The layout philosophy follows a **Fixed-Fluid Hybrid**. On desktop, the content lives within a 1280px central container to maintain the "columnar" feel of a magazine. Whitespace is used aggressively; vertical sections are separated by `stack-lg` (80px) to ensure each ingredient or innovation story feels isolated and important.

Grid structures should be asymmetrical where possible—for example, a 60/40 split between high-resolution imagery of indigenous fruits (Matohwe) and clinical nutrition data. This breaks the "template" feel and reinforces the boutique, startup nature of the brand.

## Elevation & Depth

This design system avoids heavy shadows. Depth is primarily communicated through **Tonal Layering** and **Soft Ambient Occlusion**.

1.  **Level 0 (Base):** Cream (#F8F5EC) or Light Sage (#F4F8F2).
2.  **Level 1 (Cards):** Warm White (#FFFFFF) with an extremely soft, large-radius shadow (15% opacity Primary Green tint).
3.  **Interactive:** On hover, cards should lift slightly (translate Y -4px) and the shadow should expand, creating a "pillowy" tactile response.

Use subtle borders (1px solid #E5EADF) to define edges on Level 1 elements rather than relying on shadow alone, maintaining the clean editorial aesthetic.

## Shapes

The shape language is "Organic Geometric." While the layout is structured on a strict grid, the individual components use a 16px corner radius (`rounded-lg`) to reflect the softness of natural forms. 

- **Primary Cards:** 16px (1rem) corner radius.
- **Buttons & Small UI:** 8px (0.5rem) corner radius.
- **Image Masks:** Occasionally use pill-shapes or circular apertures for organic fruit photography to contrast against the sharp typography.

## Components

### Buttons
- **Primary:** Deep Green background, White text, 8px radius. Subtle Gold hover state on the border only.
- **Ghost:** Transparent background, 1px Primary Green border, Primary Green text. Used for secondary navigation.

### Premium Ingredient Cards
Used for Matohwe, Mazhanje, and Tsubvu. These cards feature a top-heavy layout: 70% high-quality image, 30% text content. The text includes a `label-caps` category tag in Gold, a `headline-md` title, and a short scientific summary in `body-md`.

### Horizontal Timelines
A clean 2px Primary Green line with circular nodes. Each node represents a stage of innovation (Harvesting, Extraction, Synthesis). Labels sit above the line in Playfair Display, with descriptions below in Hanken Grotesk.

### Statistics & Science Cards
Small, elevated White cards. The "Number" is featured in large Playfair Display font (e.g., "85% Bioavailable"), with a secondary label in Hanken Grotesk. Use the Light Sage background for these to set them apart from ingredient cards.

### Minimal Contact Forms
Floating labels with no background fill—only a bottom border (1px Primary Green). Upon focus, the bottom border thickens to 2px and the label shrinks upward.