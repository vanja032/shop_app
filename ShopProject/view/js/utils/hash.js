const sha256 = async (data) => {
    const utf8 = new TextEncoder().encode(data);
    const hash = await crypto.subtle.digest("SHA-256", utf8);
    return Array.from(new Uint8Array(hash)).map((bytes) => {
        return bytes.toString(16).padStart(2, "0")
    }).join("");
};

const algoHash = async (data) => {
    const t_value = (new Date()).getTime();
    const dataHash = await sha256(data);
    const tHash = await sha256(t_value);
    const hash = await sha256(`${dataHash}${tHash}`);
    return `${hash}${tHash}`;
};


export const Hash = {
    sha256,
    algoHash
};