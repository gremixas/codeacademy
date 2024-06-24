export const storageKey = 'atsiliepimai';
// localStorage.clear();

export function loadItems() {
  return JSON.parse(localStorage.getItem(storageKey)) || [];
}

export function pushToStorage(key, str) {
  let names = getItem();
  names.push(str);
  localStorage.setItem(key, JSON.stringify(names));
}

export function removeFromStorage(key, arg) {
  if (!(typeof arg === 'string' || typeof arg === 'number')) return;
  const names = getItem();
  let removed = [];
  if (typeof arg === 'string') removed = names.filter(item => item !== arg);
  if (typeof arg === 'number') removed = names.filter((item, i) => i !== arg);
  localStorage.setItem(key, JSON.stringify(removed));
}

export function getItem() {
  return JSON.parse(localStorage.getItem(storageKey)) || [];
}

