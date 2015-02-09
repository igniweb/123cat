# 123cat.net

## Maintaining framework

As described in http://viget.com/extend/keeping-the-framework-for-your-application-up-to-date-with-git

### Commit + push

    git add .
    git commit -m "Commit message"
    git push origin master

### Update framework

    git checkout framework
    git pull laravel master
    git checkout master
    git merge framework

## Semantic-UI

### Update process

#### Bower

Simply call 

    rm -rf resources/assets/vendor
    bower install

#### Copy custom config and build

Type in console

    cp resources/assets/semantic-ui/theme.config resources/assets/vendor/semantic-ui/src/theme.config
    cd resources/assets/vendor/semantic-ui
    npm install
    gulp install

#### Copy compiled assets and medias

    cp resources/assets/vendor/semantic-ui/dist/semantic.css resources/css/semantic-ui.css
    cp resources/assets/vendor/semantic-ui/dist/semantic.js resources/js/semantic-ui.js

And here is the fun stuff:

- Check for `resources/assets/vendor/semantic-ui/dist/themes` and copy it to public/medias as you wish
- Edit `resources/css/semantic-ui.css` and search for `url()` and replace paths to match your medias

### Build process

    cd resources/assets/vendor/semantic-ui
    gulp build

And redo previous point (Copy compiled assets and medias)
