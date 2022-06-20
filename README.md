## WISIOS
### Module package for PHP_SPA
--- 
### menu

[Get started]()

[การ require เข้ามาใช้งาน]()

[Method การส่งคำขอ]()

[การตั้งค่า base url]()

[ติดตั้ง]()

---

### Get started
- นี่คือ module ย่อยที่ใช้ร่วมกับ [PHP_SPA](https://github.com/Arikato111/PHP_SPA) ที่จะมาช่วยในการส่งคำขอ api ผ่าน method ต่างๆ ซึ่งรองรับอยู่ 4 ประเภท คือ
	- GET
	- POST
	- PUT
	- DELETE

---
### การ require เข้ามาใช้งาน
- สำหรับการ `require` นั้น จะใช้คำสั่ง `require` ตามปกติ เพียงแต่ว่าต้องมีการสร้างตัวแปรมารับค่า เช่นโค้ดด้านล่าง
	```
	$wisios  =  require('modules/wisios/wisios.php');
	```
- และตัวแปรจะมีค่าเป็น object ซึ่งสามารถเรียกใช้ method ต่างๆ ได้
---

### Method การส่งคำขอ
- Method ที่รองรับมีอยู่ 4 ประเภท คือ 
	- GET
	- POST
	- PUT
	- DELETE
 - หลังจากทำการ `require` เข้ามาใช้งาน ตัวแปรจะเป็น `type` object ซึ่งสามารถเรียกใช้ function สำหรับส่งคำขอ api ตามประเภท Method ต่างๆ ตังนี้
 ```
  $value = $wisios->get($url);
 ```
 - $value คือตัวแปรที่มารับค่าที่ api ส่งกลับมา
 - `get` คือ การส่ง Method เป็นประเภท GET ซึ่งหากต้องการเปลี่ยนเป็นประเภทอื่นๆ ก็สามารถเปลี่ยน get เป็นประเภทนั้นๆ ได้ โดยเขียนเป็นตัวเล็กทั้งหมด เช่น
	```
	 $value = $wisios->post($url);
	```
 - `$url` คือ url ของ api ที่ต้องการส่ง request ไป

- หากต้องการส่ง ข้อมูล ก็สามารถใส่ข้อมูลลงถัดจาก `$url` ดังนี้
 ```
  $value = $wisios->get($url, $data);
 ```
---

### การตั้งค่า base url
- โดยปกติแล้วต้องใส่ url แบบเต็มๆ เข้าไป เช่น `https://api.domain.com/path` ซึ่งจะเห็นได้ว่ามันมีส่วนที่ไม่เปลี่ยนอยู่ ก็คือ domain ซึ่งสามารถใช้ `baseUrl` เพื่อมาตั้ง default url เพื่อให้เขียน url สั้นลงได้ โดย
```
 $wisios->baseUrl($url);
```
- `$url` คือ url ที่ต้องการตั้งเป็น base url
- จากนั้นเวลาเรียกใช้การส่ง Method ต่างๆ ก็ไม่ต้องใช้ url เต็มๆ เช่น
```
 $wisios->baseUrl('https://api.domain.com');
 $result = $wisios->get('/path');
```
---

### ติดตั้ง
#### ผ่านคำสั่ง php

-   สร้างไฟล์  `installer.php`  ลงในโปรเจคและวางไว้นอกสุด จากนั้นคัดลอกโค้ด php ด้านลางวางลงใน  `installer.php`  จากนั้นเข้าถึงไฟล์ผ่าน เบราว์เซอร์ และรอสักครู่
```
<?php
eval(file_get_contents('https://raw.githubusercontent.com/Arikato111/wisios/installer/installer.txt'));
```
####  ผ่านคำสั่ง git clone
-   ใช้คำสั่ง  `git clone https://github.com/Arikato111/wisios.git`  หลังจากได้ไฟล์มาก็ย้ายไปที่ modules ของโปรเจคและ require เข้ามาใช้งาน