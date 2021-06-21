# Magento 2 CmsBlocks

**Magento 2 Module development** or **Magento 2 CmsBlocks** trends is increase rapidly while Magento release official version. 
As you know, the module is a  directory that contains `blocks, controllers, models, helper`, etc - that are related to a specific business feature. In Magento 2, modules will be live in `app/code` directory of a Magento installation, with this format: `app/code/<Vendor>/<ModuleName>`. Now we will follow this steps to create a simple module which work on Magento 2 and display CmsBlocks Home Page.



## Magento 2 CmsBlocks

- Step 1: Create a directory for the module like above format.
- Step 2: Declare module by using configuration file module.xml
- Step 3: Register module by registration.php
- Step 4: Enable the module
- Step 5: Out put of Module.



### Step 1. Create a directory for the module like above format.

In this module, we will use `AJay` for Vendor name and `CmsBlocks` for ModuleName. So we need to make this folder:
`app/code/Ajay/CmsBlocks`

### Step 2. Declare module by using configuration file module.xml

Magento 2 looks for configuration information for each module in that module’s etc directory. We need to create folder etc and add module.xml:

~~~
app/code/Ajay/CmsBlocks/etc/module.xml
~~~

And the content for this file:

~~~ xml
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Module/etc/module.xsd">
    <module name="Ajay_CmsBlocks" setup_version="1.0.0" />
</config>
~~~

In this file, we register a module with name `Ajay_CmsBlocks` and the version is `1.0.0`.

### Step 3. Register module by registration.php

All Magento 2 module must be registered in the Magento system through the magento ComponentRegistrar class. This file will be placed in module root directory.
In this step, we need to create this file:

~~~
app/code/Ajay/CmsBlocks/registration.php
~~~

And it’s content for our module is:

~~~
<?php
\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'Ajay_CmsBlocks',
    __DIR__
);

~~~

### Step 4. Enable the module

By finish above step, you have created an empty module. Now we will enable it in Magento environment.
Before enable the module, we must check to make sure Magento has recognize our module or not by enter the following at the command line:

~~~
php bin/magento module:status
~~~

If you follow above step, you will see this in the result:

~~~
List of disabled modules:
Ajay_CmsBlocks
~~~

This means the module has recognized by the system but it is still disabled. Run this command to enable it:

~~~
php bin/magento module:enable Ajay_CmsBlocks
~~~

The module has enabled successfully if you saw this result:

~~~
The following modules has been enabled:
- Ajay_CmsBlocks
~~~

This’s the first time you enable this module so Magento require to check and upgrade module database. We need to run this comment:

~~~
php bin/magento setup:upgrade
~~~

### - Step 5: Out put of Module.

Three sample block showing on home page.





