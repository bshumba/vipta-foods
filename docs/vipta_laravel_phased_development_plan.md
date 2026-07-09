# Vipta Health Foods Website - Laravel Phased Development Plan

## Purpose

This document breaks the Vipta Health Foods website into practical Laravel phases so the site can be built one phase at a time with Codex.

The immediate goal is a polished static marketing website for Vipta Health Foods and the Miracle Breakfast Cookie. The site should stay database-free for now, but it must be structured so a future CMS can replace static arrays/config content later.

This revised plan also aligns the build with the supplied wireframes in `Vipta Foods Wireframes 2/` while softening the areas that feel too clinical for a public snack brand.

---

## Alignment Read

### What the current plan gets right

- Static-first Laravel website with Blade, Tailwind CSS, and Alpine.js.
- No database until the client approves a CMS.
- Content separated from Blade through config arrays and a small content access layer.
- Warm, natural, African-inspired direction.
- Clear warning against aggressive health claims.
- Good phase-by-phase build order.

### What needed fixing

- The existing plan mentions the African Indigenous Snacks reference, but it does not translate that feel into concrete design rules.
- The wireframes have six main pages: Home, About, Products, Our Story, Impact, and Contact. The old plan introduced a standalone Ingredients page that is not represented in the wireframe navigation.
- The old plan combines About and Our Story in places, while the wireframes treat them as different pages.
- The wireframes are visually strong, but some wording is too clinical for a snack brand: "engineering health", "alchemists", "clinical data", "scientific papers", "bioavailability", "antioxidant capacity", and lab-oriented contact language.
- Several wireframe numbers and claims look unverified. They should not ship unless the client provides evidence.

### Reference Feel Check

The live page at `https://acalytica.com/african-indigenous-snacks/` could not be accessed from the available tools during this planning pass, so the final visual comparison should be rechecked manually before implementation. Based on the requested reference direction and the page name, the site should lean toward:

- Warm African snack/product brand.
- Natural ingredients and heritage.
- Appetizing product presentation.
- Friendly commercial language.
- Earthy but bright color palette.
- Public-facing clarity over scientific positioning.

### Final Creative Direction

Use this balance:

- 70% warm African food/snack brand.
- 20% premium editorial wellness.
- 10% careful nutrition credibility.

The wireframes should be used for layout, typography, whitespace, page sequence, and premium polish. The copy and CTAs should be adjusted so the site feels like a delicious breakfast cookie brand, not a laboratory, supplement company, NGO proposal, or medical product.

---

## Tech Stack

- Laravel 13
- Blade
- Tailwind CSS
- Alpine.js
- Pest for tests where useful
- No database for the static phase
- Website content stored in `config/vipta.php`
- A simple `app/Support/ViptaContent.php` access layer

Do not add React, Vue, Inertia, Livewire, a CMS, an admin dashboard, or database tables during the static website phases.

---

## Visual Direction

### Use From The Wireframes

- Premium editorial spacing.
- Serif display headings paired with a readable sans-serif body font.
- Cream, warm white, deep green, sage, earth brown, and restrained gold accents.
- Large real-feeling food and ingredient imagery.
- Calm navigation with uppercase links.
- Simple bordered cards with subtle hover states.
- Asymmetrical image/text layouts.
- Impact sections with stronger contrast used sparingly.

### Soften From The Wireframes

Replace overly clinical wording:

- "Engineering the Future of African Nutrition" -> "A Breakfast Cookie Rooted in African Nutrition"
- "Engineering Health, Honoring Heritage" -> "Honoring Heritage, Nourishing Modern Mornings"
- "Connect with the Alchemists" -> "Contact Vipta Foods"
- "Clinical Data" -> "Ingredients" or "Nutrition Highlights"
- "Scientific Papers" -> remove from public footer unless real documents exist
- "Lab Hours" -> "Business Hours"
- "Bioavailability", "antioxidant capacity", "cellular defense" -> avoid unless verified

### Must Feel Like

- African indigenous snacks.
- Healthy breakfast convenience.
- Natural ingredients.
- Local farmer and community value.
- Friendly, premium, trustworthy, edible, and easy to understand.

### Must Not Feel Like

- A hospital or medical clinic.
- A supplement lab.
- A government or NGO funding proposal.
- A hard-science startup.
- A generic international health brand disconnected from Zimbabwean food culture.

---

## Content And Claims Rules

Some source material may include strong health claims such as preventing disease, improving fertility, boosting libido, fighting bacteria, or replacing several slices of bread and eggs.

For the public website:

- Do not present medical claims unless the client provides approved evidence and legal/regulatory clearance.
- Prefer everyday wellness language.
- Say "made with", "rooted in", "inspired by", "naturally satisfying", and "supports balanced mornings".
- Only use measurable claims like protein, fibre, calories, farmer counts, water saved, or trees planted if the client provides verified numbers.
- Add a disclaimer wherever nutrition benefits are discussed:

> This product is not intended to diagnose, treat, cure, or prevent any disease.

---

## Primary Site Map

Use the wireframe navigation as the main structure:

- `/` - Home
- `/about` - About Vipta
- `/products` - Products / Miracle Breakfast Cookie
- `/our-story` - Our Story
- `/impact` - Impact
- `/contact` - Contact / Order Enquiry

The old standalone Ingredients page should not be a first-pass primary page unless the client specifically wants it. Ingredient content should live inside Home, Products, and Our Story first. A future `/ingredients` page can be added after the core six pages are approved.

---

## Proposed Folder Structure

Codex may adjust this to match the existing Laravel project, but this is the target shape.

```text
app/
  Support/
    ViptaContent.php

config/
  vipta.php

resources/
  views/
    layouts/
      app.blade.php

    pages/
      home.blade.php
      about.blade.php
      products.blade.php
      our-story.blade.php
      impact.blade.php
      contact.blade.php

    components/
      site/
        navbar.blade.php
        footer.blade.php
        section-heading.blade.php
        button.blade.php
        badge.blade.php
        stat-card.blade.php
        ingredient-card.blade.php
        product-card.blade.php
        impact-card.blade.php
        timeline.blade.php
        testimonial-card.blade.php
        faq-item.blade.php
        cta-section.blade.php

public/
  images/
    vipta/
      logo.png
      hero-cookie.jpg
      miracle-cookie.jpg
      matohwe.jpg
      mazhanje.jpg
      tsubvu.jpg
      ginger.jpg
      farmers.jpg
      landscape.jpg
      map-placeholder.jpg
```

---

# Global Development Rules For Codex

Use these rules in every implementation phase.

```text
You are working on a Laravel 13, Blade, Tailwind CSS, and Alpine.js project for Vipta Health Foods.

Important rules:
1. Do not add a database yet.
2. Do not create migrations, models, seeders, or admin dashboards unless the current phase explicitly asks for them.
3. Store website content in config/vipta.php for now.
4. Keep the structure CMS-ready so config content can later be replaced with database content.
5. Use reusable Blade components for repeated UI.
6. Follow the six-page wireframe structure: Home, About, Products, Our Story, Impact, Contact.
7. Use the wireframes for layout and visual polish, but soften clinical/science-heavy language.
8. Keep the website warm, African-inspired, natural, edible, product-focused, and premium.
9. Use Tailwind CSS only for styling.
10. Use Alpine.js only for small interactions such as mobile menu, FAQ accordion, tabs, and enquiry selection.
11. Do not use heavy JavaScript frameworks.
12. Avoid unverified medical, nutritional, or impact claims.
13. Keep code beginner-friendly and easy to change.
```

---

# Phase 0 - Existing Project Audit And Setup Confirmation

## Goal

Confirm the current Laravel project is ready for the static website build.

## Codex Prompt

```text
Audit the existing Laravel project setup for the Vipta Health Foods website.

Requirements:
- Confirm Laravel, Blade, Tailwind CSS, and Alpine.js are available.
- Inspect package.json, composer.json, routes/web.php, resources/css/app.css, and resources/js/app.js.
- Do not create a new Laravel project if one already exists.
- Confirm the local homepage route works or identify what needs to change.
- Do not add a database, migrations, models, seeders, or admin dashboard.
- Summarize the current setup and what Phase 1 should build on.
```

## Acceptance Criteria

- Existing project state is understood.
- Tailwind and Alpine status is known.
- No unnecessary new project scaffolding is created.
- No database-dependent code is added.

---

# Phase 1 - Brand Theme, Design Tokens, Layout Shell, Navigation, Footer

## Goal

Create the global layout and design foundation using the wireframe style, adjusted for a warmer snack brand.

## Codex Prompt

```text
Build the global website shell for Vipta Health Foods.

Requirements:
- Create or update resources/views/layouts/app.blade.php.
- Create reusable navbar and footer components.
- Add responsive mobile navigation using Alpine.js.
- Use the primary navigation:
  - Home
  - About
  - Products
  - Our Story
  - Impact
  - Contact
- Add a primary CTA button: "Order / Enquire".
- Use warm design tokens inspired by the wireframes:
  - Deep green
  - Leaf green
  - Cream / warm white
  - Light sage
  - Earth brown
  - Restrained gold accent
- Use premium editorial typography if available locally or through the existing frontend setup.
- Keep corners modest and cards subtle.
- Footer should include:
  - Brand name
  - Short slogan: "Naturally Healthy"
  - Quick links
  - Contact placeholder
  - Copyright
- Do not include "Scientific Papers" unless real documents exist.
- Do not add a database.
```

## Acceptance Criteria

- Navbar is responsive.
- Mobile menu opens and closes using Alpine.js.
- Footer is visible on all pages.
- Visual foundation matches the wireframes but feels warmer and more food-focused.

---

# Phase 2 - Static Content Data Layer

## Goal

Create a CMS-ready static content layer.

## Codex Prompt

```text
Create a static content layer for the Vipta Health Foods website.

Requirements:
- Create config/vipta.php.
- Store all website copy, CTAs, page metadata, navigation, cards, and image references in arrays.
- Add these content groups:
  1. brand
  2. navigation
  3. pages.home
  4. pages.about
  5. pages.products
  6. pages.our_story
  7. pages.impact
  8. pages.contact
  9. ingredients
  10. faqs
  11. testimonials
  12. seo
- Create app/Support/ViptaContent.php with typed methods to read content from config('vipta').
- Keep the class simple and easy to replace later with database-backed content.
- Use careful placeholder copy based on Vipta Health Foods, Miracle Breakfast Cookie, Matohwe, Mazhanje, Tsubvu, ginger, and local farmer impact.
- Avoid unverified medical, nutritional, or impact claims.
- Do not create migrations, models, or seeders.
```

## Acceptance Criteria

- Visible copy can come from `config/vipta.php`.
- Blade pages do not contain large hardcoded copy blocks.
- Content structure maps cleanly to a future CMS.

---

# Phase 3 - Home Page

## Goal

Build the main landing page using the Home wireframe structure, but with warmer product-first copy.

## Codex Prompt

```text
Build the Vipta Health Foods homepage using content from config/vipta.php.

Use the Home wireframe as the layout reference, but adjust the message so it feels like a warm African breakfast cookie brand, not a science lab.

Homepage sections:
1. Hero
   - Suggested headline: "A Breakfast Cookie Rooted in African Nutrition"
   - Supporting text about Miracle Breakfast Cookie, indigenous ingredients, and modern mornings.
   - CTA buttons: "Explore Products" and "Order / Enquire".
   - Use a product or breakfast image placeholder.

2. Benefit badges
   - Natural ingredients
   - Indigenous fruits
   - Breakfast convenience
   - Farmer partnerships
   - No artificial additives, only if verified

3. Product introduction
   - Introduce Miracle Breakfast Cookie.
   - Mention Matohwe as a featured ingredient.

4. Ingredient preview
   - Matohwe
   - Mazhanje
   - Tsubvu
   - Ginger

5. Heritage and modern mornings
   - Adapt the wireframe "Rooted in Heritage" section with less clinical language.

6. Impact preview
   - Farmers
   - Local processing
   - Rural value addition

7. Testimonials or customer quote placeholders
   - Clearly mark as placeholders until real testimonials exist.

8. Final CTA
   - "Ready to try a small miracle every morning?"
   - Button: "Contact Us"

Use reusable Blade components where useful.
Do not use a database.
```

## Acceptance Criteria

- Home page feels like a real product landing page.
- Product imagery is prominent in the first viewport.
- Content comes from config.
- The page keeps the wireframe polish while becoming warmer and more snack-focused.

---

# Phase 4 - About Page

## Goal

Create the About page as a brand mission page, matching the About Us wireframe but avoiding lab-heavy positioning.

## Codex Prompt

```text
Create the About page for Vipta Health Foods.

Route:
- /about

View:
- resources/views/pages/about.blade.php

Requirements:
- Use content from config/vipta.php.
- Use the About Us wireframe as the structure reference.
- Include sections:
  1. Hero: "Honoring Heritage, Nourishing Modern Mornings"
  2. Mission
  3. Vision
  4. Journey overview
  5. Local value addition / community preview
  6. CTA to Products or Contact
- Keep the tone warm, credible, and founder/brand-oriented.
- Avoid phrases like "modern alchemists", "biomimetic", "efficacy", and "engineering health".
- Do not use unverified stats.
- Do not add a database.
```

## Acceptance Criteria

- About page explains who Vipta is.
- The page supports trust without sounding clinical.
- The visual style aligns with the wireframes.

---

# Phase 5 - Products / Miracle Breakfast Cookie Page

## Goal

Create the main commercial product page.

## Codex Prompt

```text
Create the Products page for Vipta Health Foods, focused on the Miracle Breakfast Cookie.

Route:
- /products

View:
- resources/views/pages/products.blade.php

Requirements:
- Use content from config/vipta.php.
- Use the Products wireframe as the structure reference.
- Product hero with a cookie image.
- Explain what the Miracle Breakfast Cookie is.
- Highlight Matohwe as the featured ingredient.
- Add product/ingredient cards:
  - Matohwe
  - Mazhanje
  - Tsubvu
  - Ginger
- Add feature cards:
  - Made for breakfast
  - Easy on busy mornings
  - Rooted in indigenous ingredients
  - Naturally satisfying
- Add a careful nutrition highlights section.
- Only show numbers if marked as verified in config.
- Add flavours or variants if confirmed:
  - Original Matohwe
  - Mazhanje Blend
  - Tsubvu Blend
  - Ginger Touch
- Add packaging/availability placeholder.
- Add CTA: "Order / Enquire".
- Do not include "Clinical Data" or aggressive medical claims.
- Do not create database tables or models.
```

## Acceptance Criteria

- Products page clearly sells and explains the cookie.
- It is appetizing and customer-friendly.
- Ingredients are educational but not too technical.
- Health and nutrition claims are careful.

---

# Phase 6 - Our Story Page

## Goal

Create a deeper editorial story page about heritage, ingredients, and the journey from local harvest to modern product.

## Codex Prompt

```text
Create the Our Story page for Vipta Health Foods.

Route:
- /our-story

View:
- resources/views/pages/our-story.blade.php

Requirements:
- Use content from config/vipta.php.
- Use the Our Story wireframe as the layout reference.
- Include sections:
  1. Hero: "Roots in the Earth, Made for Modern Mornings"
  2. Founder or brand quote placeholder
  3. Reclaiming Matohwe
  4. From fruit to cookie
  5. The pathway:
     - Sourcing
     - Preparation
     - Baking
     - Packaging
  6. CTA to Products
- Keep the writing emotional, premium, and natural.
- Avoid the phrase "food science startup" unless the client specifically wants that positioning.
- Avoid clinical language and unverified metrics.
- Do not create a database.
```

## Acceptance Criteria

- The page reads like a strong brand story.
- It complements About rather than duplicating it.
- It creates emotional connection around heritage and product.

---

# Phase 7 - Impact Page

## Goal

Create a page about local farmers, indigenous fruit value addition, local processing, and community development.

## Codex Prompt

```text
Create the Impact page for Vipta Health Foods.

Route:
- /impact

View:
- resources/views/pages/impact.blade.php

Requirements:
- Use content from config/vipta.php.
- Use the Impact wireframe as the visual reference, but soften any overly dark or corporate sections if needed.
- Explain how the product supports:
  - Local farmers
  - Indigenous fruit value addition
  - Rural income generation
  - Local processing
  - Employment opportunities
  - Sustainable agriculture
- Add a section called "From Rural Harvest to Breakfast Table".
- Add 3 to 6 impact cards.
- Add a simple timeline:
  1. Farmer partnerships
  2. Fruit sourcing
  3. Local preparation
  4. Baking and packaging
  5. Market growth
- Do not use impact numbers unless the client verifies them.
- Do not make the page sound like a funding proposal.
- Add CTA: "Partner With Us" or "Contact Us".
- Do not add a database.
```

## Acceptance Criteria

- The page explains social and economic value clearly.
- It is suitable for customers, partners, and possible investors.
- It remains public-facing and warm.

---

# Phase 8 - Contact / Order Enquiry Page

## Goal

Create a practical contact and order enquiry page without database storage.

## Codex Prompt

```text
Create a Contact / Order Enquiry page for Vipta Health Foods.

Route:
- /contact

View:
- resources/views/pages/contact.blade.php

Requirements:
- Use content from config/vipta.php.
- Use the Contact wireframe layout as the structure reference.
- Replace lab-oriented wording with order/enquiry wording.
- Add contact details placeholders:
  - Phone
  - WhatsApp
  - Email
  - Location
  - Business hours
- Add enquiry type cards or select options:
  - Personal order
  - Wholesale order
  - Stockist / retailer enquiry
  - Partnership enquiry
  - General enquiry
- Add a clean contact form UI:
  - Name
  - Phone
  - Email
  - Enquiry type
  - Message
- Since there is no database, do not store submissions.
- For now, the submit button can show a friendly Alpine.js message that direct WhatsApp/email is available.
- Add a WhatsApp CTA button.
- Do not create database tables, models, migrations, or mail features yet.
```

## Acceptance Criteria

- Contact page is clear and useful.
- Users know how to order or enquire.
- No fake backend storage exists.
- No database code exists.

---

# Phase 9 - Reusable Components Refactor

## Goal

Clean up repeated Blade code into reusable components after the six main pages exist.

## Codex Prompt

```text
Refactor the current Vipta Health Foods Blade website into reusable components.

Requirements:
- Identify repeated UI patterns and convert them into Blade components.
- Suggested components:
  - section-heading
  - button
  - badge
  - stat-card
  - ingredient-card
  - product-card
  - impact-card
  - timeline
  - testimonial-card
  - cta-section
  - faq-item
- Keep all content coming from config/vipta.php.
- Do not change the visual design drastically.
- Do not add a database.
- Keep the code beginner-friendly.

After refactoring, confirm all pages still work:
- /
- /about
- /products
- /our-story
- /impact
- /contact
```

## Acceptance Criteria

- Less repeated code.
- Components are easy to understand.
- Pages still look the same or better.
- No broken routes.

---

# Phase 10 - Responsiveness, Polish, And Alpine Interactions

## Goal

Improve mobile experience and add small interactions.

## Codex Prompt

```text
Polish the Vipta Health Foods website for responsiveness and small interactions.

Requirements:
- Improve mobile, tablet, and desktop spacing.
- Make hero sections responsive.
- Make cards stack cleanly on mobile.
- Improve navbar mobile menu.
- Add Alpine.js interactions only where useful:
  - FAQ accordion
  - Mobile menu
  - Product flavour tabs
  - Enquiry type selector
- Add subtle hover states for buttons/cards.
- Keep animations restrained.
- Check that text does not overlap images or cards.
- Do not add external JavaScript frameworks.
- Do not add a database.
```

## Acceptance Criteria

- Site looks good on mobile and desktop.
- Interactions are simple and helpful.
- No heavy JavaScript added.

---

# Phase 11 - SEO, Accessibility, And Performance

## Goal

Prepare the static site for public use.

## Codex Prompt

```text
Improve SEO, accessibility, and performance for the Vipta Health Foods Laravel website.

Requirements:
- Add dynamic page titles and meta descriptions from config/vipta.php.
- Add Open Graph meta tags.
- Add meaningful alt text for images.
- Ensure buttons and links have accessible labels.
- Check heading hierarchy.
- Improve semantic HTML.
- Add or update robots.txt if needed.
- Add a basic sitemap route or sitemap.xml view if simple.
- Ensure images use sensible sizes and local placeholders.
- Keep the site fast and simple.
- Do not add a database.
```

## Acceptance Criteria

- Each page has a unique title and description.
- HTML structure is accessible.
- Images have useful alt text.
- Site is ready for basic indexing.

---

# Phase 12 - Final Content And Claims Pass

## Goal

Make all copy client-ready and legally safer.

## Codex Prompt

```text
Do a final content and claims cleanup for the Vipta Health Foods website.

Requirements:
- Review all text in config/vipta.php.
- Make wording clear, warm, natural, and customer-friendly.
- Keep Miracle Breakfast Cookie positioned as:
  - Natural
  - Convenient
  - Breakfast-focused
  - Rooted in indigenous African ingredients
  - Supportive of local farmers
- Remove or soften clinical/science-heavy phrases unless the client approves them.
- Avoid aggressive medical claims.
- Use general wellness language only.
- Add a simple disclaimer where nutrition benefits are mentioned.
- Mark any placeholder testimonials, numbers, contact details, or product claims for client replacement.
- Do not change the page structure drastically.
- Do not add a database.
```

## Acceptance Criteria

- Copy sounds client-ready.
- Messaging is consistent.
- Public claims are careful.
- Website feels like a real African snack/product brand.

---

# Phase 13 - Basic Route Tests And Manual QA Checklist

## Goal

Confirm the static site works before deployment.

## Codex Prompt

```text
Add basic verification for the Vipta Health Foods static website.

Requirements:
- Add simple Pest feature tests confirming these pages load successfully:
  - /
  - /about
  - /products
  - /our-story
  - /impact
  - /contact
- Keep tests small and beginner-friendly.
- Also create or update a manual checklist only if requested.
- Confirm:
  - Navbar links
  - Footer links
  - Mobile menu
  - Contact CTA buttons
  - Image placeholders
  - Responsiveness
  - SEO meta tags
  - Accessibility basics
  - No database dependency
```

## Acceptance Criteria

- Basic route tests pass.
- Main manual QA points are known.
- No unnecessary testing complexity is added.

---

# Phase 14 - Deployment Preparation

## Goal

Prepare the Laravel static marketing site for deployment.

## Codex Prompt

```text
Prepare the Vipta Health Foods Laravel website for deployment.

Requirements:
- Add deployment notes only if requested.
- Include commands for:
  - composer install --no-dev --optimize-autoloader
  - npm ci
  - npm run build
  - php artisan config:cache
  - php artisan route:cache
  - php artisan view:cache
- Since there is no database, do not include migration commands.
- Add .env production notes.
- Add file permission notes for storage and bootstrap/cache.
- Add web server notes for Nginx or Apache if useful.
- Add rollback notes if useful.
- Keep this as documentation only unless configuration files already exist.
```

## Acceptance Criteria

- Deployment requirements are clear.
- No database migration commands are included.
- Site can be deployed as a simple Laravel marketing website.

---

# Optional Phase A - Contact Form Email Without Database

## Goal

Only do this if the client wants enquiry form submissions to send to email.

## Codex Prompt

```text
Add a simple contact form email feature without using a database.

Requirements:
- Add a ContactController.
- Add a POST route for /contact.
- Validate:
  - name required
  - phone nullable
  - email nullable|email
  - enquiry_type required
  - message required
- Do not store submissions in a database.
- Send the enquiry to the configured business email using Laravel Mail.
- Add a Mailable class.
- Add a Blade email template.
- Show success/failure flash messages.
- Keep WhatsApp CTA as an alternative.
- Do not create database tables, migrations, or models.
```

## Acceptance Criteria

- Contact form sends email.
- No database storage is used.
- Validation works.
- User sees a success message.

---

# Optional Phase B - Future CMS Preparation

## Goal

Prepare for a CMS only after the static website is approved.

## Codex Prompt

```text
Prepare the Vipta Health Foods website structure for a future CMS, without building the CMS yet.

Requirements:
- Review how content is loaded from config/vipta.php.
- Ensure page content goes through app/Support/ViptaContent.php.
- Propose future CMS tables in the response before creating any files.
- Do not create migrations or models yet.
- Do not build an admin dashboard yet.

Possible future CMS tables:
- pages
- page_sections
- products
- ingredients
- testimonials
- faqs
- enquiries
- settings
- media
```

## Acceptance Criteria

- No actual CMS has been built.
- Static website remains working.
- Future CMS direction is clear and approved before implementation.

---

# Optional Phase C - Future CMS Build

## Goal

Only do this when the client confirms they want an admin side.

## Do Not Start This Early

This phase should only happen after the static website is approved.

## Future CMS Scope

Possible CMS features:

- Login/admin authentication
- Manage pages
- Manage page sections
- Manage products
- Manage ingredients
- Manage testimonials
- Manage FAQs
- Manage enquiries
- Manage images
- Manage SEO settings

## Codex Prompt

```text
We now want to convert the Vipta Health Foods static Laravel website into a simple CMS.

Before coding, inspect the current config/vipta.php content structure and app/Support/ViptaContent.php.

Requirements:
- Propose the database structure first.
- Do not start coding migrations until the structure is approved.
- CMS should manage:
  - pages
  - page sections
  - products
  - ingredients
  - testimonials
  - FAQs
  - enquiries
  - settings
  - media
- Keep frontend views mostly unchanged.
- Replace config content gradually with database content.
- Use a simple admin panel approach.
- Keep it beginner-friendly.
```

## Acceptance Criteria

- CMS is not rushed.
- Static website remains working.
- Database structure is approved before implementation.

---

# Suggested Build Order Summary

1. Audit current setup.
2. Build design tokens, layout, navbar, and footer.
3. Create static content layer.
4. Build Home page.
5. Build About page.
6. Build Products page.
7. Build Our Story page.
8. Build Impact page.
9. Build Contact page.
10. Refactor reusable components.
11. Polish responsiveness and Alpine interactions.
12. Add SEO, accessibility, and performance basics.
13. Do final content and claims cleanup.
14. Add basic route tests and QA.
15. Prepare deployment notes.
16. Optional email form.
17. Optional CMS planning.
18. Optional CMS build.

---

# First Implementation Prompt

Use this when you are ready to start Phase 0:

```text
Audit the existing Laravel project for the Vipta Health Foods website.

The website is for a healthy breakfast cookie brand called Miracle Breakfast Cookie. The featured ingredient is Matohwe, with other indigenous African ingredients such as Mazhanje, Tsubvu, and ginger.

Tech stack target:
- Laravel 13
- Blade
- Tailwind CSS
- Alpine.js
- No database for now
- Content will be stored in config arrays
- The code should be CMS-ready so arrays can later be replaced with database content

Design direction:
- Warm
- Natural
- African-inspired
- Earthy
- Product-focused
- Friendly
- Premium editorial, but still appetizing and commercial
- Similar feeling to the African Indigenous Snacks reference
- Based on the supplied wireframes, but less clinical/science-heavy

For this phase only:
1. Inspect the existing project setup.
2. Confirm Tailwind CSS and Alpine.js status.
3. Inspect the current homepage route.
4. Identify exactly what needs to be done in Phase 1.
5. Do not create migrations, models, seeders, controllers, or admin dashboards yet.

Keep the code simple and beginner-friendly.
```

---

# Developer Notes

The most important architectural decision is content separation.

Avoid this:

```text
Write all page copy directly inside Blade files.
```

Prefer this:

```text
Store copy, cards, links, image references, CTAs, and SEO metadata in config/vipta.php.
Use Blade only to display content.
Read content through app/Support/ViptaContent.php.
Later, replace config content with database content when a CMS is approved.
```

Before implementation, manually re-open the African Indigenous Snacks reference if possible and compare it against the final design direction. If the reference feels more colorful, casual, or product-commerce oriented than the current wireframes, bias toward the reference for warmth and appetite appeal while keeping the wireframes' spacing and typography discipline.
