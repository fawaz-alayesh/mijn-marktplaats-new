// tailwind.config.js
module.exports = {
  content:[
    './index.php',
    "./node_modules/flowbite/**/*.js",
  ],

  theme: {
      
      hamburgers: {
          base: {},
          modern: {
              scale: {
                  spaceBetween: .5,
                  barHeight: .125,
                  barWidth: 1,
                  barRadius: 0,
                  padding: 0
              }
          }
      }
  },
  
  plugins: [
        require('flowbite/plugin'),
        
    ]


}