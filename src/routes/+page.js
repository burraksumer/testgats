export const load = async ({ fetch }) => {
	try {
		const fetchSong = async () => {
			const songRes = await fetch('https://api.mulayim.app/lastfm');

			if (!songRes.ok) {
				throw new Error(`Failed to fetch collections data. Status: ${songRes.status}`);
			}

			const songData = await songRes.json();
			return songData;
		};

		const fetchCarbon = async () => {
			const carbonRes = await fetch('https://api.mulayim.app/carbon');

			if (!carbonRes.ok) {
				throw new Error(`Failed to fetch collections data. Status: ${carbonRes.status}`);
			}

			const carbonData = await carbonRes.json();
			return carbonData;
		};

		return {
			streamed: {
				song: fetchSong(),
				carbon: fetchCarbon()
			}
		};
	} catch (error) {
		// Handle the error here
		return {
			redirect: '/error'
		};
	}
};
