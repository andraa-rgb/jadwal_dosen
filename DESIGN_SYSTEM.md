# 🎨 Design System & Styling Guide

## Color Palette

### Primary Colors
```
Purple-50:    #faf5ff (Lightest)
Purple-100:   #f3e8ff
Purple-200:   #e9d5ff (Used for borders)
Purple-300:   #d8b4fe
Purple-400:   #c084fc
Purple-500:   #a855f7
Purple-600:   #9333ea (PRIMARY)
Purple-700:   #7e22ce
Purple-800:   #6b21a8
Purple-900:   #581c87 (Darkest)
```

### Accent Colors
- **Emerald** (Success): #10b981
- **Yellow** (Warning): #eab308
- **Red** (Error/Danger): #ef4444
- **Blue** (Info): #3b82f6
- **Gray** (Neutral): #6b7280

---

## Typography

### Font Family
- **Font:** Poppins (Google Fonts)
- **Weights:** 300 (Light), 400 (Regular), 600 (Semibold), 700 (Bold), 900 (Black)

### Headings
```html
<!-- h1 -->
<h1 class="text-4xl md:text-5xl font-black">Big Title</h1>

<!-- h2 -->
<h2 class="text-3xl md:text-4xl font-bold">Section Title</h2>

<!-- h3 -->
<h3 class="text-2xl font-bold">Subsection</h3>

<!-- h4 -->
<h4 class="text-xl font-semibold">Small Title</h4>
```

### Body Text
```html
<!-- Normal -->
<p class="text-base text-gray-700">Regular paragraph text</p>

<!-- Small -->
<p class="text-sm text-gray-600">Small text</p>

<!-- Large -->
<p class="text-lg text-gray-900">Large text</p>
```

---

## Component Classes

### Cards

#### `.card-modern`
Modern card with white background, border, and shadow.
```html
<div class="card-modern">
  <!-- Content -->
</div>
```
**CSS:**
- Background: white
- Border: 2px purple-100
- Rounded: 16px (2xl)
- Shadow: lg shadow-purple-100/50
- Hover: Enhanced shadow

#### `.card-gradient`
Card with gradient background (purple to white).
```html
<div class="card-gradient">
  <!-- Content -->
</div>
```
**CSS:**
- Background: linear-gradient to bottom-right (purple-50 to white)
- Border: 2px purple-200
- Rounded: 16px
- Hover: Enhanced border color

#### `.glass-morphism`
Glass effect card (frosted glass appearance).
```html
<div class="glass-morphism">
  <!-- Content -->
</div>
```
**CSS:**
- Background: white/80 with blur
- Backdrop filter: blur(16px)
- Border: white/50

### Buttons

#### `.btn-primary`
Primary button (purple with white text).
```html
<button class="btn-primary">Click Me</button>
<a href="#" class="btn-primary">Link Button</a>
```
**CSS:**
- Background: linear-gradient (purple-600 to purple-800)
- Text: white, bold
- Padding: 12px 24px (3x6)
- Rounded: 12px
- Shadow: lg
- Hover: Enhanced shadow, scale-up
- Active: scale-down

#### `.btn-outline`
Outline button (purple border with purple text).
```html
<button class="btn-outline">Click Me</button>
```
**CSS:**
- Border: 2px purple-500
- Text: purple-700, bold
- Background: transparent
- Hover: purple-50 background
- Rounded: 12px

#### `.btn-secondary`
Secondary button (gray background).
```html
<button class="btn-secondary">Cancel</button>
```
**CSS:**
- Background: gray-200
- Text: gray-800, bold
- Hover: gray-300

### Badges

#### `.badge-purple`
Purple badge for tags/labels.
```html
<span class="badge-purple">Label</span>
```
**CSS:**
- Background: purple-100
- Text: purple-700, bold
- Padding: 4px 12px
- Rounded: 16px

#### `.status-ada` (Available)
Green status badge.
```html
<span class="badge-success">🟢 Available</span>
```
**CSS:**
- Background: emerald-100
- Text: emerald-700
- Border: emerald-200

#### `.status-mengajar` (Teaching)
Red status badge.
```html
<span class="badge-danger">🔴 Teaching</span>
```
**CSS:**
- Background: red-100
- Text: red-700
- Border: red-200

#### `.status-konsultasi` (Consultation)
Yellow status badge.
```html
<span class="badge-warning">🟡 Consultation</span>
```
**CSS:**
- Background: yellow-100
- Text: yellow-700
- Border: yellow-200

### Form Elements

#### `.form-input`
Standard form input field.
```html
<input type="text" class="form-input" placeholder="Enter text">
```
**CSS:**
- Width: 100%
- Padding: 12px 16px
- Border: 2px purple-200
- Rounded: 12px
- Focus: border-purple-500, ring-4 ring-purple-200
- Transition: all 300ms

#### `.form-select`
Select dropdown field.
```html
<select class="form-input">
  <option>Option 1</option>
</select>
```
**CSS:** Same as form-input

#### `.form-textarea`
Text area for longer text.
```html
<textarea class="form-input">Enter text</textarea>
```
**CSS:** Same as form-input

---

## Animations

### `.animate-blob`
Floating blob animation (7 second loop).
```html
<div class="animate-blob rounded-full bg-purple-300"></div>
```
**Animation:**
- Scale: 1 → 1.1 → 1
- Opacity: Floating effect
- Duration: 7 seconds
- Infinite loop

### `.animate-fade-in`
Fade in animation on page load.
```html
<div class="animate-fade-in">Content</div>
```
**Animation:**
- Opacity: 0 → 1
- Duration: 1 second
- Ease: ease-out

### `.animate-slide-down`
Slide down animation.
```html
<div class="animate-slide-down">Content</div>
```
**Animation:**
- Transform: translateY(-20px) → translateY(0)
- Opacity: 0 → 1
- Duration: 0.5 seconds

### `.hover-lift`
Lift effect on hover.
```html
<div class="hover-lift">Content</div>
```
**CSS:**
- Hover: translateY(-8px)
- Hover: Enhanced shadow
- Duration: 300ms

### `.hover-scale`
Scale effect on hover.
```html
<button class="hover-scale">Click</button>
```
**CSS:**
- Hover: scale-110
- Duration: 300ms

### `.transition`
Smooth transition for all property changes.
```html
<div class="transition hover:text-purple-600">Text</div>
```
**CSS:**
- Duration: 300ms
- Easing: ease-out

---

## Spacing System

### Padding
```
p-1 = 4px,   p-2 = 8px,   p-3 = 12px,  p-4 = 16px
p-5 = 20px,  p-6 = 24px,  p-8 = 32px,  p-12 = 48px
```

### Margin
```
m-1 = 4px,   m-2 = 8px,   m-3 = 12px,  m-4 = 16px
m-5 = 20px,  m-6 = 24px,  m-8 = 32px,  m-12 = 48px
```

### Gap (Grid/Flex)
```
gap-2 = 8px,   gap-4 = 16px,  gap-6 = 24px,  gap-8 = 32px
```

---

## Responsive Breakpoints

### Mobile First Approach
```
Default:     320px+  (mobile)
sm:          640px+  (small devices)
md:          768px+  (tablets)
lg:          1024px+ (laptops)
xl:          1280px+ (desktops)
2xl:         1536px+ (large monitors)
```

### Usage Examples
```html
<!-- 1 column on mobile, 2 on tablet, 3 on desktop -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
  <!-- Items -->
</div>

<!-- Hidden on mobile, visible on tablet+ -->
<div class="hidden md:block">Content</div>

<!-- Larger text on desktop -->
<h1 class="text-2xl md:text-4xl lg:text-5xl">Title</h1>
```

---

## Shadow System

### Light Shadow
```
shadow-sm = small shadow
shadow = medium shadow
shadow-md = medium shadow
shadow-lg = large shadow (most common)
```

### Shadow with Color
```
shadow-lg shadow-purple-100/50 = purple-tinted shadow
shadow-lg shadow-red-200/50 = red-tinted shadow
```

### Hover Shadow Enhancement
```html
<div class="shadow-lg hover:shadow-2xl transition">Content</div>
```

---

## Border Styles

### Thickness
```
border = 1px
border-2 = 2px (most common for cards)
border-4 = 4px (accents)
```

### Colors
```
border-purple-200 = light purple (cards)
border-purple-300 = medium purple (hover states)
border-gray-200 = light gray (dividers)
```

### Radius
```
rounded-lg = 8px
rounded-xl = 12px (buttons)
rounded-2xl = 16px (cards)
rounded-full = 9999px (circles)
```

---

## Gradient Backgrounds

### `.bg-gradient-primary`
Purple gradient (primary button background).
```html
<div class="bg-gradient-primary text-white">Content</div>
```
**Gradient:** purple-600 → purple-800

### `.bg-gradient-light`
Light purple to white gradient.
```html
<div class="bg-gradient-light">Content</div>
```
**Gradient:** purple-50 → white

### `.text-gradient`
Text with gradient color.
```html
<h1 class="text-gradient">Gradient Text</h1>
```
**Gradient:** purple-600 → purple-800 (background-clip: text)

---

## Complete Component Examples

### Card with Title and Button
```html
<div class="card-modern">
  <h2 class="text-2xl font-bold text-gray-900 mb-4">Card Title</h2>
  <p class="text-gray-600 mb-6">Card description goes here.</p>
  <button class="btn-primary">Action</button>
</div>
```

### Status Badge Group
```html
<div class="flex gap-2">
  <span class="badge-success">🟢 Ada</span>
  <span class="badge-danger">🔴 Mengajar</span>
  <span class="badge-warning">🟡 Konsultasi</span>
</div>
```

### Form Group
```html
<div class="mb-6">
  <label for="name" class="block text-sm font-bold text-gray-700 mb-2">
    Full Name
  </label>
  <input 
    type="text" 
    id="name"
    class="form-input"
    placeholder="Enter your name"
  />
</div>
```

### Hero Section
```html
<div class="relative py-20 px-4 bg-gradient-light rounded-2xl">
  <div class="max-w-2xl mx-auto text-center">
    <h1 class="text-5xl font-black text-gray-900 mb-4">
      Welcome to Lab WICIDA
    </h1>
    <p class="text-xl text-gray-600 mb-8">
      Platform manajemen jadwal dosen
    </p>
    <button class="btn-primary">Get Started</button>
  </div>
</div>
```

---

## Dark Mode (Future Enhancement)

The current system uses light theme (purple-white). For dark mode support in the future:

1. Add `dark:` prefixed classes
2. Use `prefers-color-scheme` media query
3. Add theme toggle in settings

---

## Best Practices

### ✅ DO
- Use semantic HTML (h1, h2, button, input)
- Use utility classes from Tailwind
- Combine classes for complex styles
- Use responsive prefixes (md:, lg:)
- Keep spacing consistent (use Tailwind values)

### ❌ DON'T
- Don't add custom CSS unless necessary
- Don't hardcode colors (use Tailwind values)
- Don't break responsive design
- Don't use deprecated CSS
- Don't add complex animations that hurt performance

---

## Testing Responsive Design

To test responsive design:

1. **Browser DevTools:** Press F12
2. **Responsive Mode:** Ctrl+Shift+M
3. **Test Sizes:**
   - 375px (iPhone)
   - 768px (iPad)
   - 1024px (Laptop)
   - 1440px (Desktop)

---

**Last Updated:** 2026-02-06
**System:** Lab WICIDA Design System v1.0
