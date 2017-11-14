# Image Captions Plugin

Looks for images with defined title attribute and converts them to figcaption.

The **Image Captions** Plugin is for [Grav CMS](http://github.com/getgrav/grav).

## Installation

Installing the Image Captions plugin can be done in one of two ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line). From the root of your Grav install type:

    bin/gpm install image-captions

This will install the Image Captions plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/image-captions`.

### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `image-captions`. You can find these files on [GitHub](https://github.com/newkind/grav-plugin-image-captions) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/image-captions	

## Configuration

Before configuring this plugin, you should copy the `user/plugins/image-captions/image-captions.yaml` to `user/config/plugins/image-captions.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
```

Enables and disables the plugin.

```yaml
scope: body
```

You can define the scope in which plugin will operate. This can be either an HTML tag (ie. `body`, `span`, `p`) or ID (ie. `#main-content`, `#footer`) or class (ie. `.my-paragraph`, `.image-block`)

```yaml
class: caption
```
Only images with these classes will get their titles converted. You can combine multiple classes ie. `caption block` will look only for images with both classes applied.

