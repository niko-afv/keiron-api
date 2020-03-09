FROM node:latest as react-build
WORKDIR /app

COPY . ./

RUN npm install
CMD ["npm", "run", "start"]